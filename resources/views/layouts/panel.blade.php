<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="favicon.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'All American Finishing') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/presets.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
    <div id="app" s-layout="panel">
        <overlay></overlay>
        <navigation-panel></navigation-panel>
        <header>
        <figure><a href="/"><img src="{{asset('img/svg/logo.svg')}}" width="150" alt=""></a></figure>
            <article>
                <h2>Bienvenido al Panel <span>Perro</span></h2>
                <button type="button" class="btn">Logout</button>
            </article>
        </header>
        @yield('content')
    </div>
    <div class="overlay" s-active="false"></div>
    <footer>
        
    </footer>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
