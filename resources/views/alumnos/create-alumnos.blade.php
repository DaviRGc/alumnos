@extends('layout.app')

@section('title', 'Crear alumno')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-8">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Crear nuevo alumno</h1>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="mb-4 p-4 rounded bg-red-100 text-red-800">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario --}}
    <form action="{{ route('alumnos.store') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
            <input type="text" id="codigo" name="codigo"
                   value="{{ old('codigo') }}"
                   required
                   class="mt-1 w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="nombre" name="nombre"
                   value="{{ old('nombre') }}"
                   required
                   class="mt-1 w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido</label>
            <input type="text" id="apellido" name="apellido"
                   value="{{ old('apellido') }}"
                   required
                   class="mt-1 w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                   value="{{ old('fecha_nacimiento') }}"
                   required
                   class="mt-1 w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="correo" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
            <input type="email" id="correo" name="correo"
                   value="{{ old('correo') }}"
                   required
                   class="mt-1 w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="genero" class="block text-sm font-medium text-gray-700">Género</label>
            <select id="genero" name="genero"
                    required
                    class="mt-1 w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Seleccione...</option>
                <option value="masculino" {{ old('genero') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="femenino" {{ old('genero') == 'femenino' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>

        <div>
            <label for="carrera" class="block text-sm font-medium text-gray-700">Carrera</label>
            <input type="text" id="carrera" name="carrera"
                   value="{{ old('carrera') }}"
                   required
                   class="mt-1 w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="flex justify-end gap-3 mt-6">
            <a href="{{ route('alumnos.index') }}"
               class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
               Cancelar
            </a>

            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-500 shadow">
                Guardar alumno
            </button>
        </div>
    </form>
</div>
@endsection
