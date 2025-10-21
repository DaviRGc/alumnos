<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumno: Editar</title>
</head>
<body>
    <h1>Editar alumno</h1>
    <form action="{{ route('alumnos.update', ['alumno' => $alumno->id]) }}" method="POST">
        <div>
        @csrf
        @method('PUT')
        </div>
        <label for="codigo">Código:</label>
    <input type="text" id="codigo" name="codigo" value="{{ $alumno->codigo }}" required>
        <br>
        <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="{{ $alumno->nombre }}" required>
        <br>
        <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" value="{{ $alumno->apellido }}" required>
        <br>
        <label for="genero">Género:</label>
        <select id="genero" name="genero" required>
            <option value="masculino" {{ $alumno->genero == 'masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="femenino" {{ $alumno->genero == 'femenino' ? 'selected' : '' }}>Femenino</option>
        </select>
        <br>
        <label for="carrera">Carrera:</label>
    <input type="text" id="carrera" name="carrera" value="{{ $alumno->carrera }}" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>