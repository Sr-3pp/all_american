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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
    <div id="app" s-layout="secondary">
        <navigation section="{{$main}}" name="general"></navigation>
        @yield('content')
    </div>
    <footer>
        
    </footer>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    function initMap() {
      var uluru = {lat: 36.1348678, lng: -115.1842497};
      var map = new google.maps.Map(
          document.getElementById('map'), {zoom: 9, center: uluru});
      var marker = new google.maps.Marker({position: uluru, map: map});
    }
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8EY_pBJgh2R8YCba9_O6C_t0D3PQ71i0&callback=initMap">
        </script>
</body>
</html>
