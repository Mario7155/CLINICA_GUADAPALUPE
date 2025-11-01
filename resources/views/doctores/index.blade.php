<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Doctores</title>
</head>
<body>
    <h1>Lista de Doctores</h1>

    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('doctores.create') }}">➕ Nuevo Doctor</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>DNI</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($doctores as $doctor)
            <tr>
                <td>{{ $doctor->id_doctor }}</td>
                <td>{{ $doctor->dni }}</td>
                <td>{{ $doctor->nombres }}</td>
                <td>{{ $doctor->apellidos }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->estado }}</td>
                <td>
                    <a href="{{ route('doctores.edit', $doctor->id_doctor) }}">Editar</a>
                    <form action="{{ route('doctores.destroy', $doctor->id_doctor) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Seguro que deseas eliminarlo?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
