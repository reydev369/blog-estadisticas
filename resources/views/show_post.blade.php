@extends('layouts.app')

@section('title', 'Configuración')

@section('navbar')

@section('content')

    <div class="container-show-post">
    <div class="image_source">
    <img id="image_post" src="{{$post->url_image}}" alt="" width="400px" height="300px">
    <p id="image_foot">{{$post->image_foot}}</p>
    </div>
    <h1 id="title_post">{{$post->title}}</h1>

    <div id="content_post">{!! $post->content !!}</div>
    <p id="source_post"><b>Fuente: </b>{{$post->source}}</p>
    </div>



@endsection
