<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Citas</title>
</head>
<body>
    <h1>👋 Hola, {{ $paciente->nombres }}</h1>
    <h2>📅 Mis Citas Médicas</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('citas.create') }}">➕ Nueva cita</a>
    <a href="{{ route('pacientes.panel') }}">🏠 Volver al panel</a>

    <table border="1" cellpadding="5">
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Motivo</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        @forelse ($citas as $cita)
        <tr>
            <td>{{ $cita->fecha }}</td>
            <td>{{ $cita->hora }}</td>
            <td>{{ $cita->motivo ?? 'Sin motivo' }}</td>
            <td>{{ ucfirst($cita->estado) }}</td>
            <td>
                @if($cita->estado === 'pendiente')
                    <a href="{{ route('citas.cancelar', $cita->id_cita) }}">❌ Cancelar</a>
                @else
                    -
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No tienes citas registradas.</td>
        </tr>
        @endforelse
    </table>
</body>
</html>
