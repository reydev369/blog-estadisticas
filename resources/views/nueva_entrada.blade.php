@extends('layouts.app')

@section('title', 'Nosotros')



@section('navbar')

@section('content')
<h1 id="new_post">Nueva entrada</h1>
<div class="container-post">
    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input id="Texto" class="input-text" name="title" type="text" placeholder="Titulo">
        <textarea class="input-content"type="text" name="txtDescripcion" id="txtDescripcion"></textarea>

        <input class="input-text" type="text" name="source" placeholder="Fuente">
        <input type="file" name="file" id="" accept="image/*">
        <input class="input-text" type="text" name="foot_image" placeholder="Pie de imagen">

        <button type="submit" class="button">Publicar</button>
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
