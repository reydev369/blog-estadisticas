<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('configuracion', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nueva_entrada');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'file' => 'required|image'
        ]);
        $image = $request->file('file')->store('public');
        $url = Storage::url($image);
        $id = auth()->user()->id;

        Post::create([
            'title' => $request->title,
            'content' => $request->txtDescripcion,
            'url_image' => $url,
            'image_foot' => $request->foot_image,
            'source' => $request->source,
            'user_id' => $id,
        ]);

        //redireccionar configuracion
        return redirect()->route('configuracion');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);

        return view('show_post', [
            'post' => Post::findOrFail($id)
        ]);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('editar_entrada',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' =>'required',
            'file' => 'required|image'

        ]);
        $image = $request->file('file')->store('public');
        $url = Storage::url($image);
        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->content = $request->get('txtDescripcion');
        $post->url_image = $url;
        $post->image_foot = $request->get('image_foot');
        $post->source = $request->get('source');
        $post->save();
        return redirect()->route('configuracion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('configuracion');
    }
}
