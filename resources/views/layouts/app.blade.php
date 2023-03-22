<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon"> 
        <title>@yield('tituloPagina')</title>
        @include('includes.head')
    </head>
    <body>
        <main id="app">
            @include('includes.header')
            @yield('conteudo')
        </main>
        @include('includes.footer')
    </body>
    @stack('script')
</html>
