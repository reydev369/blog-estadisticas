@extends('layouts.app')

@section('title', 'Nosotros')



@section('navbar')

@section('content')
<h1 id="new_post">Editar entrada</h1>
<div class="container-post">
    <form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <input class="input-text" name="title" type="text" value="{{$post->title}}">
        <textarea class="input-content" type="text" name="txtDescripcion" id="txtDescripcion" >{{$post->content}}</textarea>
        <input class="input-text" type="text" name="source" value="{{$post->source}}">
        <input type="file" name="file" id="" accept="image/*">
        <input class="input-text" type="text" name="image_foot" value="{{$post->image_foot}}">
        <button type="submit" class="button">Editar</button>
    </form>
</div>
 <script>
        ClassicEditor
            .create( document.querySelector( '#txtDescripcion' ) )
            .catch( error => {
            console.error( error );
            } );
        </script>
@endsection
