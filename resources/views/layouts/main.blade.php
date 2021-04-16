<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Custom Meta Tags --}}
    @yield('meta_tags')

    {{-- Title --}}
    <title>
        @yield('title', config('app.name', 'Laravel'))
    </title>

    {{-- Base Stylesheets --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- Custom Styles --}}
    @stack('css')

</head>

<body>

    <div class="container vh-100">
        {{-- Body Content --}}
        @yield('body')
    </div>


{{-- Base Scripts --}}
<script src="{{ asset('js/app.js') }}"></script>

@stack('js')

</body>

</html>
