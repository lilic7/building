<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('images/LBlogo.png') }}" rel="icon" type="image/x-icon">
    <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="https://fonts.googleapis.com/css?family=PT+Serif+Caption:400,400i" rel="stylesheet">

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}" ></script>


    @yield('scripts')

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div class="page-content">
        @include('layouts.header')
        <div id="app">
            <div class="content-body">
                @yield('content')
            </div>
        </div>
        @include('layouts.footer')
    </div>
</body>
</html>
