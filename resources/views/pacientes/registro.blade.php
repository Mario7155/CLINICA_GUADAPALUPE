<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Paciente</title>
</head>
<body>
    <h1>🧍 Registro de Paciente</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pacientes.registrar') }}" method="POST">
        @csrf
        <label>DNI:</label><br>
        <input type="text" name="dni" value="{{ old('dni') }}"><br><br>

        <label>Nombres:</label><br>
        <input type="text" name="nombres" value="{{ old('nombres') }}"><br><br>

        <label>Apellidos:</label><br>
        <input type="text" name="apellidos" value="{{ old('apellidos') }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password"><br><br>

        <label>Confirmar contraseña:</label><br>
        <input type="password" name="password_confirmation"><br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono" value="{{ old('telefono') }}"><br><br>

        <label>Dirección:</label><br>
        <input type="text" name="direccion" value="{{ old('direccion') }}"><br><br>

        <button type="submit">Registrarme</button>
    </form>
</body>
</html>
