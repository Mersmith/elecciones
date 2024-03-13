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
    @include('layouts.administracion.componentes.css')
</head>

<body>
    <!--MENU PRINCIPAL ADMINISTRADOR-->
    @livewire('menu.menu-principal')

    <!--MAIN PÁGINA-->
    <main class="contenedor_layout_administrador">
        @yield('content')
    </main>

    <!--SCRIPTS-->
    @include('layouts.administracion.componentes.js')
    @stack('modals')
    @livewireScripts
    @stack('script')
</body>

</html>
