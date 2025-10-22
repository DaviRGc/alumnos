@extends('layout.app')

@section('title', 'Listado de alumnos')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    {{-- Encabezado --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Listado de alumnos</h1>
        <a href="{{ route('alumnos.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-500 transition">
            + Crear alumno
        </a>
    </div>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    {{-- Tabla --}}
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Apellido</th>
                    <th class="px-10 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Correo</th>
                    <th class="px-4 py-2 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse ($alumnos as $alumno)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $alumno->id }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $alumno->nombre }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $alumno->apellido }}</td>
                        <td class="px-10 py-2 text-sm text-gray-700">{{ $alumno->correo }}</td>
                        <td class="px-4 py-2 text-sm text-center">
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('alumnos.show', $alumno) }}"
                                   class="text-green-600 hover:text-green-800 font-medium">Ver</a>
                                <a href="{{ route('alumnos.edit', $alumno) }}"
                                   class="text-indigo-600 hover:text-indigo-800 font-medium">Editar</a>
                                <form action="{{ route('alumnos.destroy', $alumno) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('¿Seguro que deseas eliminar este alumno?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:text-red-800 font-medium">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            No hay alumnos registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Paginación (si la tienes configurada) --}}
    @if (method_exists($alumnos, 'links'))
        <div class="mt-6">
            {{ $alumnos->links() }}
        </div>
    @endif
</div>
@endsection
