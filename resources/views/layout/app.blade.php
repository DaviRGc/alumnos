<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi aplicación')</title>

    {{-- Estilos con Vite y Tailwind --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    <nav class="bg-indigo-600 text-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">
           
            <ul class="flex gap-6 text-sm">
                <li><a href="{{ route('alumnos.index') }}" class="hover:underline">Alumnos</a></li>
                
            </ul>
        </div>
    </nav>

    {{-- CONTENIDO PRINCIPAL --}}
    <main class="flex-1 max-w-7xl mx-auto p-6 w-full">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-gray-800 text-gray-300 text-center py-4 text-sm">
        © {{ date('Y') }} crud — Todos los derechos reservados a diosito que me dio la fuerza.
    </footer>

    {{-- Scripts con Vite --}}
    @vite('resources/js/app.js')
</body>
</html>
