@extends('layouts.app')

@section('title', 'Configuración')

@section('navbar')

@section('content')

<a href="{{URL('post/create')}}"> <button class="button">Nueva entrada</button></a>
<h1 id="title">Todas las entradas</h1>
<div class="container">
    @foreach ($posts as $post )
        <div class="card">
            <img src="{{asset($post->url_image)}}" alt="image" >
            <h2>{{$post->title}}</h2>
            <div class="content-card">{!! $post->content !!}</div>
            <div class="buttons">

            <a href="{{route('post.edit',$post->id)}}"> <button class="button-edit">Editar</button></a>

            <form action="post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
            <a href=""> <button class="button-delete">Borrar</button></a>
            </form>
        </div>
        </div>
    @endforeach

</div>
@endsection
