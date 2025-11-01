<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Doctor</title>
</head>
<body>
    <h1>Registrar Doctor</h1>

    <form action="{{ route('doctores.store') }}" method="POST">
        @csrf
        <label>DNI:</label><br>
        <input type="text" name="dni" required><br>

        <label>Nombres:</label><br>
        <input type="text" name="nombres" required><br>

        <label>Apellidos:</label><br>
        <input type="text" name="apellidos" required><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono"><br>

        <label>Email:</label><br>
        <input type="email" name="email"><br>

        <label>Estado:</label><br>
        <select name="estado">
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select><br><br>

        <button type="submit">Guardar</button>
    </form>

    <a href="{{ route('doctores.index') }}">⬅️ Volver</a>
</body>
</html>
