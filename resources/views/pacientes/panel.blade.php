<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Paciente</title>
</head>
<body>
    <h1>🏥 Bienvenido, {{ $paciente->nombres }} {{ $paciente->apellidos }}</h1>

    <p><strong>DNI:</strong> {{ $paciente->dni }}</p>
    <p><strong>Email:</strong> {{ $paciente->email }}</p>
    <p><strong>Teléfono:</strong> {{ $paciente->telefono ?? 'No registrado' }}</p>

    <form action="{{ route('pacientes.logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>
