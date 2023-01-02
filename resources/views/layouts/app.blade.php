<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_token" content="{!! csrf_token() !!}" />
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
    <script src="{{asset('js/scriptapp.js')}}"></script>
    <title>@yield('title')</title>
</head>

<body>

    <header>
    @yield('navbar')
            <a href="{{url('/')}}"><img id="logo" src="{{asset('img/logo blog.png')}}" alt=""></a>
        <nav id="menu">
            <ul class="nav_links">
                <li>
                    <a href="{{URL('/')}}">Inicio</a>
                </li>
                <li>
                    @guest
                    <a href="{{URL('/masvisitados')}}">Más visitados</a>
                    @endguest

                </li>
                <li>
                <a href="{{URL('/nosotros')}}">Nosotros</a>
                </li>
            </ul>
        </nav>
        @auth
                    <a href="{{URL('/configuracion')}}"><button class="button">Configuracion</button></a>
                    <form action="/logout" method="post">
                        @csrf
                         <button type="submit" class="button-delete">logout</button>
                    </form>
        @endauth
    </header>

    <div class="content">
    @yield('content')
    </div>


</body>

</html>
