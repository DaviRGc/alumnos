@extends('layout.app')

@section('title', 'Editar alumno')

@section('content')
<div class="bg-white shadow rounded-lg p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Editar alumno</h1>

    <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
            <input type="text" id="codigo" name="codigo" value="{{ old('codigo', $alumno->codigo) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>

        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $alumno->nombre) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>

        <div>
            <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido</label>
            <input type="text" id="apellido" name="apellido" value="{{ old('apellido', $alumno->apellido) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>

        <div>
            <label for="genero" class="block text-sm font-medium text-gray-700">Género</label>
            <select id="genero" name="genero"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                <option value="masculino" {{ old('genero', $alumno->genero) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="femenino" {{ old('genero', $alumno->genero) == 'femenino' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>

        <div>
            <label for="carrera" class="block text-sm font-medium text-gray-700">Carrera</label>
            <input type="text" id="carrera" name="carrera" value="{{ old('carrera', $alumno->carrera) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>

        <div>
            <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>

        <div>
            <label for="correo" class="block text-sm font-medium text-gray-700">Correo</label>
            <input type="email" id="correo" name="correo" value="{{ old('correo', $alumno->correo) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
        </div>

        <div class="flex items-center justify-end mt-6">
            <a href="{{ route('alumnos.index') }}"
               class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 transition mr-3">
                Cancelar
            </a>
            <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-500 transition">
                Guardar cambios
            </button>
        </div>
    </form>
</div>
@endsection
