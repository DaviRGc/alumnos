<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name'))</title>

    {{-- Vite - carga Tailwind / assets del proyecto --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- lugar para estilos adicionales (opcional) --}}
    @stack('styles')
</head>
<body>

    {{-- Contenido principal --}}
    @yield('content')

    {{-- lugar para scripts adicionales (opcional) --}}
    @stack('scripts')

</body>
</html>
