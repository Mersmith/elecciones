<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!--META TAGS-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('descripcion')">

    <!--TITULO-->
    <title>{{ env('APP_NAME') }} | @yield('tituloPagina')</title>

    <!-- SCRIPTS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- STYLES -->
    @livewireStyles
    @include('layouts.web.componentes.css')
</head>

<body>
    <!--MENU PRINCIPAL WEB-->
    @livewire('web.menu.menu-principal')

    <!--MAIN PÁGINA-->
    <main>
        @yield('content')
        @if (isset($slot))
            {{ $slot }}
        @endif
    </main>

    <!--SCRIPTS-->
    @include('layouts.web.componentes.js')
    @stack('modals')
    @livewireScripts
    @stack('script')
</body>

</html>
