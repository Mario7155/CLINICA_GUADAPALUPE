<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Cita</title>
</head>
<body>
    <h1>📅 Registrar nueva cita</h1>

    @if ($errors->any())
        <div style="color: red;">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('citas.store') }}" method="POST">
        @csrf
        <label>Fecha:</label><br>
        <input type="date" name="fecha" value="{{ old('fecha') }}"><br><br>

        <label>Hora:</label><br>
        <input type="time" name="hora" value="{{ old('hora') }}"><br><br>

        <label>Motivo:</label><br>
        <textarea name="motivo">{{ old('motivo') }}</textarea><br><br>

        <button type="submit">Guardar cita</button>
    </form>

    <p><a href="{{ route('citas.index') }}">← Volver a mis citas</a></p>
</body>
</html>
