@extends('layouts.app')

@section('title', 'Inicio')

@section('navbar')

@section('content')
<h1 id="title">Todos los articulos</h1>
<div class="container">
    @foreach ($posts as $post )
    <form action="" method="GET" name="showPost" id="showPost">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="card" id="card{{$post->id}}">

        <input class="image-card" type="image" src="{{asset($post->url_image)}}" id="image-card{{$post->id}}">
            <h2 class="title-card" id="title-card{{$post->id}}">{{$post->title}}</h2>
            <div class="content-card" id="content-card{{$post->id}}">{!! $post->content !!}</div>

</div>
    </form>
    @endforeach
    <script src="{{asset('js/scriptapp.js')}}"></script>

    @endsection
