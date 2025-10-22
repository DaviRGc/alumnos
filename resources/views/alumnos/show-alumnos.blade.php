@extends('layout.app')

@section('title', 'Detalle del alumno')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-lg mx-auto">
    {{-- Enlace de regreso --}}
    <div class="mb-4">
        <a href="{{ route('alumnos.index') }}"
           class="text-indigo-600 hover:text-indigo-800 font-medium">
            ← Volver al listado
        </a>
    </div>

    {{-- Encabezado --}}
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">
        Alumno: {{ $alumno->nombre }} {{ $alumno->apellido }}
    </h1>

    {{-- Detalles del alumno --}}
    <div class="space-y-3 text-gray-700">
        <p><strong class="text-gray-900">Código:</strong> {{ $alumno->codigo }}</p>
        <p><strong class="text-gray-900">Género:</strong> {{ ucfirst($alumno->genero) }}</p>
        <p><strong class="text-gray-900">Carrera:</strong> {{ $alumno->carrera }}</p>
        <p><strong class="text-gray-900">Fecha de nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</p>
        <p><strong class="text-gray-900">Correo:</strong> {{ $alumno->correo }}</p>
    </div>

    {{-- Botones de acción --}}
    <div class="flex justify-end gap-3 mt-6">
        <a href="{{ route('alumnos.edit', $alumno) }}"
           class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-500 transition">
            Editar
        </a>

        <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST"
              onsubmit="return confirm('¿Seguro que deseas eliminar este alumno?');">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="px-4 py-2 bg-red-600 text-white rounded-md shadow hover:bg-red-500 transition">
                Eliminar
            </button>
        </form>
    </div>
</div>
@endsection
