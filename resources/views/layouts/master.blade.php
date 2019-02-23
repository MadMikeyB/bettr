<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{csrf_token()}}">
    @stack('styles-before')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="{{mix('style.min.css')}}">
    @stack('styles-after')
    @stack('schema')
    @stack('meta')

    <title>@yield('title', 'Bettr')</title>
</head>
<body>
    @include('layouts.partials.header')

    <div id="app">
        @yield('content')
    </div>

    @include('layouts.partials.footer')


    @stack('scripts-before')
    <script src="{{mix('scripts.min.js')}}"></script>    
    @stack('scripts-after')
</body>
</html>
