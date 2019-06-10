<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/presets.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <article>
            <p>
                <icon name="phone"></icon> <b>(702)</b> 722 3197
            </p>
            <p>
                <icon name="email"></icon> <b>lalo@allamericanfinishing.com</b>
            </p>
        </article>
        <article>
            <span>&nbsp;
                <icon name="facebook"></icon>
            </span>
            <span>&nbsp;
                <icon name="twitter"></icon>
            </span>
            <span>&nbsp;
                <icon name="in"></icon>
            </span>
        </article>
    </header>
    <div id="app" s-layout="general">
        <navigation section="{{$main}}" name="general"></navigation>
        <div class="content">
                @yield('content')
                <section class="section-menu">
                <submenu :sec="{{json_encode($section)}}" :submenu="{{json_encode($menu)}}"></submenu>
                    <subscribe></subscribe>
                </section>
        </div>
        <article class="separator full-section">
            <p class="title">
                Request for a free estimate
            </p>
            <button class="cta btn"> Contact Us</button>
        </article>
    </div>
    <footer>
        
    </footer>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
