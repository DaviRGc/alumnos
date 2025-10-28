@extends('layout.app')

@section('title', 'Listado de alumnos')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Alumnos</h1>
        <a href="{{ route('alumnos.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-500">
            + Crear alumno
        </a>
    </div>

  <table>
    <thead>
        <tr>
            <th class="px-4 py-2 border-b">ID</th>
            <th class="px-4 py-2 border-b">Nombre</th>
            <th class="px-4 py-2 border-b">Apellido</th>
            <th class="px-10 py-2 border-b">Genero</th>
            <th class="px-10 py-2 border-b">Correo</th>
            <th class="px-4 py-2 border-b">Carrera</th>
            <th class="px-4 py-2 border-b">Fecha de Nacimiento</th>
            <th class="px-4 py-2 border-b">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alumnos as $alumno)
            <tr>
                <td class="px-4 py-2 border-b">{{ $alumno->id }}</td>
                <td class="px-4 py-2 border-b">{{ $alumno->nombre }}</td>
                <td class="px-4 py-2 border-b">{{ $alumno->apellido }}</td>
                <td class="px-10 py-2 border-b">{{ $alumno->genero }}</td>
                <td class="px-10 py-2 border-b">{{ $alumno->correo }}</td>
                <td class="px-4 py-2 border-b">{{ $alumno->carrera }}</td>
                <td class="px-4 py-2 border-b">{{ $alumno->fecha_nacimiento }}</td>
                <td class="px-4 py-2 border-b">
                    <a href="{{ route('alumnos.edit', $alumno) }}" class="text-indigo-600 hover:underline">Editar</a>
                    |<a href="{{ route('alumnos.show', $alumno) }}" class="text-green-600 hover:underline">Ver</a>
                    <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar este alumno?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection
