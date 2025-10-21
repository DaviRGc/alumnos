<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DETALLE</title>
</head>
<body>
    <ul>
        <li>
            <a href="{{ route('alumnos.index') }}">Alumnos</a>
        </li>
    </ul>
    <h1>Alumno: {{ $alumno->nombre }} {{ $alumno->apellido }}</h1>

    <p>
        <strong>Género:</strong> {{ $alumno->genero }}<br>
        <strong>Carrera:</strong> {{ $alumno->carrera }}<br>
        <strong>Código:</strong> {{ $alumno->codigo }}<br>
        <strong>Fecha de Nacimiento:</strong> {{ $alumno->fecha_nacimiento }}<br>
        <strong>Correo:</strong> {{ $alumno->correo }}<br>
    </p>
</body>
</html>