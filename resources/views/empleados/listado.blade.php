<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Empleados</title>
    <style>
        body{ font-family: Arial, sans-serif; padding:20px; }
        table{ width:100%; border-collapse:collapse; }
        th,td{ border:1px solid #ddd; padding:8px; }
        th{ background:#007bff; color:white; }
        .btn { display:inline-block; padding:8px 12px; background:#28a745; color:white; text-decoration:none; border-radius:4px; }
    </style>
</head>
<body>
    <h2>Listado de Empleados</h2>
    <a href="{{ route('empleados.crear') }}" class="btn">➕ Crear Empleado</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre completo</th>
                <th>DNI</th>
                <th>Celular</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $e)
                <tr>
                    <td>{{ $e->id }}</td>
                    <td>{{ $e->codigo_empleado }}</td>
                    <td>{{ $e->primer_nombre }} {{ $e->segundo_nombre }} {{ $e->primer_apellido }} {{ $e->segundo_apellido }}</td>
                    <td>{{ $e->dni }}</td>
                    <td>{{ $e->celular }}</td>
                    <td>
                        @if($e->foto_path)
                            <img src="{{ asset('storage/' . $e->foto_path) }}" alt="foto" style="height:50px;">
                        @else
                            -
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
