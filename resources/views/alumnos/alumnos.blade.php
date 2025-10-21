<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>alumnos</title>
</head>
<body>
    <h1>Listado de Alumnos</h1>
    <ul>
        <li>
            <a href="{{ route('alumnos.create') }}">Crear nuevo alumno</a>
        </li>
    </ul>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Género</th>
                <th>Carrera</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->id }}</td>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->apellido }}</td>
                    <td>{{ $alumno->genero }}</td>
                    <td>{{ $alumno->carrera }}</td>
                    <td>
                        <a href="{{ route('alumnos.show', $alumno->id) }}">Ver</a>
                        <a href="{{ route('alumnos.edit', $alumno->id) }}">Editar</a>
                        <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                     /*<td>
                        <a href="{{ route('alumnos.edit', $alumno->id) }}">Editar</a>
                         <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
</body>
</html>