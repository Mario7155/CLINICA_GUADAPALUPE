<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Doctor</title>
</head>
<body>
    <h1>Editar Doctor</h1>

    <form action="{{ route('doctores.update', $doctor->id_doctor) }}" method="POST">
        @csrf
        @method('PUT')

        <label>DNI:</label><br>
        <input type="text" name="dni" value="{{ $doctor->dni }}" required><br>

        <label>Nombres:</label><br>
        <input type="text" name="nombres" value="{{ $doctor->nombres }}" required><br>

        <label>Apellidos:</label><br>
        <input type="text" name="apellidos" value="{{ $doctor->apellidos }}" required><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono" value="{{ $doctor->telefono }}"><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ $doctor->email }}"><br>

        <label>Estado:</label><br>
        <select name="estado">
            <option value="activo" {{ $doctor->estado == 'activo' ? 'selected' : '' }}>Activo</option>
            <option value="inactivo" {{ $doctor->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
        </select><br><br>

        <button type="submit">Actualizar</button>
    </form>

    <a href="{{ route('doctores.index') }}">⬅️ Volver</a>
</body>
</html>
