<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Restaurant Management- APP') }}</title>

        <script type="text/javascript" src="{{ asset('libs/jquery/jquery-3.5.js')}}"></script>
        <link rel="stylesheet" href="{{ asset('libs/jquery-ui-1.12.1/jquery-ui.css') }}">
        <link href="{{asset('libs/bootstrap-4.6.0/css/bootstrap.css')}}" rel="stylesheet" />
        <script type="text/javascript" src="{{ asset('libs/bootstrap-4.6.0/js/bootstrap.js')}}"></script>
        
        <script type="text/javascript" src="{{ asset('libs/jquery-ui-1.12.1/jquery-ui.js')}}"></script>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <script src="{{asset('js/app.js')}}"></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    </head>

    <body>

        @include('partials.navbar')
        <div class="container pt-5 ">
            @yield('content')

        </div>

    </body>
</html>
