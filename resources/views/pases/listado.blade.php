<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Pases</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
        a { text-decoration: none; color: #007bff; font-weight: bold; }
        .success { background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>

    <h2>Listado de Pases de Salidas</h2>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pases.crear') }}">➕ Nuevo Pase</a>

    <table>
        <thead>
            <tr>
                <th>Empleado</th>
                <th>No. Empleado</th>
                <th>Departamento</th>
                <th>Fecha</th>
                <th>Asunto</th>
                <th>Hora Salida</th>
                <th>Hora Entrada</th>
                <th>Tiempo Tomado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pases as $p)
                <tr>
                    <td>{{ $p->nombre_empleado }}</td>
                    <td>{{ $p->numero_empleado }}</td>
                    <td>{{ $p->departamento }}</td>
                    <td>{{ $p->fecha }}</td>
                    <td>{{ $p->asunto }}</td>
                    <td>{{ $p->hora_salida }}</td>
                    <td>{{ $p->hora_entrada }}</td>
                    <td>{{ $p->tiempo_tomado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
