<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layout.head')
    @include('layout.header')    
    <body>
        @yield('content')
    </body>
    @include('layout.footer') 
</html>
