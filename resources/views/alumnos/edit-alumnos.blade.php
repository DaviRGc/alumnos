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
    <form action="{{ route('alumnos.update', $alumnos->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" value="{{ $alumnos->codigo }}" required>
        <br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ $alumnos->nombre }}" required>
        <br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="{{ $alumnos->apellido }}" required>
        <br>
        <label for="genero">Género:</label>
        <select id="genero" name="genero" required>
            <option value="masculino" {{ $alumnos->genero == 'masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="femenino" {{ $alumnos->genero == 'femenino' ? 'selected' : '' }}>Femenino</option>
        </select>
        <br>
        <label for="carrera">Carrera:</label>
        <input type="text" id="carrera" name="carrera" value="{{ $alumnos->carrera }}" required>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>