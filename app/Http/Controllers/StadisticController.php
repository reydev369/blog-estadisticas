<?php

namespace App\Http\Controllers;

use App\Models\Stadistic;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Helpers\UserSystemInfoHelper;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
class StadisticController extends Controller
{
    public function index(){
        $posts = Post::where('total_visits',">",0)->orderBy('total_visits','DESC')->take(3)->get();

        return view('estadisticas')->with(compact('posts'));
    }



    public function addClickStadistic(Request $request){
        $request->validate([
            'id' => 'required',
            'type' => 'required'
        ]);

        $id_post = (int)$request->id;

        $getip = UserSystemInfoHelper::get_ip();
        $visitor = DB::table('visitors')->where('ip_address',$getip)->first();
        $id_visitor = $visitor->id;

        $stadistics = DB::table('stadistics')->where('id_visitor',$id_visitor)->where('id_post',$id_post)->first();


        if(!$stadistics){
            if(strcmp($request->type, "click_title") === 0){
                Stadistic::create([
                    'id_visitor' => $id_visitor,
                    'id_post' => $id_post,
                    'click_title' => 1

                ]);
                self::addArticleStadistic($id_post);
                return response()->json(['success' => 'Creado con exito']);
            }
            if(strcmp($request->type, "click_image") === 0){
                Stadistic::create([
                    'id_visitor' => $id_visitor,
                    'id_post' => $id_post,
                    'click_image' => 1

                ]);
                self::addArticleStadistic($id_post);
                return response()->json(['success' => 'Creado con exito']);
            }
            if(strcmp($request->type, "click_content") === 0){
                Stadistic::create([
                    'id_visitor' => $id_visitor,
                    'id_post' => $id_post,
                    'click_content' => 1

                ]);
                self::addArticleStadistic($id_post);
                return response()->json(['success' => 'Creado con exito']);
            }
        }

        $stadistic_id = $stadistics->id;
        $stadistics_visitor = Stadistic::find($stadistic_id);

        if($id_post == $stadistics->id_post && $id_visitor == $stadistics->id_visitor){
            if(strcmp($request->type,"click_title") === 0){
                $stadistics_visitor->click_title = $stadistics_visitor->click_title + 1;
                $stadistics_visitor->save();
                self::addArticleStadistic($id_post);
                return response()->json(['success' => 'Creado con exito']);
            }
            if(strcmp($request->type,"click_image") === 0){
                $stadistics_visitor->click_image = $stadistics_visitor->click_image + 1;
                $stadistics_visitor->save();
                self::addArticleStadistic($id_post);
                return response()->json(['success' => 'Creado con exito']);
            }
            if(strcmp($request->type,"click_content") === 0){
                $stadistics_visitor->click_content = $stadistics_visitor->click_content + 1;
                $stadistics_visitor->save();
                self::addArticleStadistic($id_post);
                return response()->json(['success' => 'Creado con exito']);
            }
        }
    }

    public function addArticleStadistic($id){
        $post = Post::find($id);
        $post->total_visits = $post->total_visits + 1;
        $post->save();
    }

    public function chart(){
        $posts = Post::where('total_visits',">", 0)->orderBy('total_visits','DESC')->get();

        return response()->json($posts);
    }
}
