<!doctype html>
<html lang="{{ app()->getLocale() }}">

    <head>

        {{-- Page Format --}}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Page Title --}}
        <title>@if(View::hasSection('title'))@yield('title') - {{ config('app.name', 'ENYAHS') }}@elseif(isset($title)) {{ $title . " - " . config('app.name') }} @else{{ config('app.name') }}@endif</title>
        
        {{-- Page Information --}}
        <meta name="description" content="{{ (isset($description) && is_string($description)) ? $description : 'No Description.'}}">
        <meta name="keywords" content="{{ (isset($keywords) && is_array($keywords)) ? implode(',', $keywords) : ''}}">
        <meta name="author" content="{{ config('app.name', 'ENYAHS') }}">

        {{-- Page Settings --}}
        <meta name="robots" content="index, follow">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">

        {{-- Global Stylesheets --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        {{-- Stylesheets --}}
        @stack('styles')

        {{-- Additional Head Tags --}}
        @yield('head')

    </head>

    <body class='m-0 position-relative'>

        {{-- Core Template --}}
        @yield('core-template')

        {{-- Global Javascript --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        {{-- Javascript --}}
        @stack('scripts')

    </body>

</html>