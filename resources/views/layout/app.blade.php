<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>

    {{-- Vite: carga CSS/JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Permite push de estilos desde vistas hijas --}}
    @stack('styles')
</head>
<body class="antialiased bg-white text-gray-900">

    {{-- Header --}}
    @include('partials.header')

    {{-- Main content --}}
    <main class="container mx-auto py-6 px-4">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Permite push de scripts desde vistas hijas --}}
    @stack('scripts')
</body>
</html>