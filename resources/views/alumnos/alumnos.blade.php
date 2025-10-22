<x-layouts.app :title="__('Listado de alumnos')">

    <div class="max-w-7xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Alumnos</h1>
        <a href="{{ route('alumnos.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-500">
            + Crear alumno
        </a>
    </div>

    @if(session('success'))
    <div class="mb-4 p-3 rounded bg-green-100 text-green-800">{{ session('success') }}</div>
    @endif


    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-10 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Código</th>
                    <th class="px-10 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-10 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Apellido</th>
                    <th class="px-10 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Nac.</th>
                    <th class="px-10 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correo</th>
                    <th class="px-10 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @forelse($alumnos as $alumno)
                <tr>
                    <td class="px-10 py-4 whitespace-nowrap text-sm text-gray-700">{{ $alumno->codigo ?? '-' }}</td>
                    <td class="px-10 py-4 whitespace-nowrap text-sm text-gray-700">{{ $alumno->nombre }}</td>
                    <td class="px-10 py-4 whitespace-nowrap text-sm text-gray-700">{{ $alumno->apellido }}</td>
                    <td class="px-10 py-4 whitespace-nowrap text-sm text-gray-500">{{ optional($alumno->fecha_nacimiento)->format('Y-m-d') ?? '-' }}</td>
                    <td class="px-10 py-4 whitespace-nowrap text-sm text-gray-700">{{ $alumno->correo ?? '-' }}</td>
                    <td class="px-10 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('alumnos.show', $alumno) }}" class="text-indigo-600 hover:text-indigo-900 mr-2 px-2">Ver</a>
                        <a href="{{ route('alumnos.edit', $alumno) }}" class="text-yellow-600 hover:text-yellow-800 mr-2 px-2">Editar</a>
                        <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar este alumno?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">No hay alumnos.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="p-4 border-t border-gray-100 bg-gray-50">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-600">Mostrando {{ $alumnos->firstItem() ?? 0 }} - {{ $alumnos->lastItem() ?? 0 }} de {{ $alumnos->total() ?? 0 }}</div>
            <div>
                {{ $alumnos->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
    </div>

</x-layouts.app>