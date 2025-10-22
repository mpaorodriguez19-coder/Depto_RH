<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Puestos</title>
    <style>
        /* === Estilos básicos === */
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
        a { text-decoration: none; color: #007bff; font-weight: bold; }
        .success { background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>

    <h2>📋 Listado de Puestos</h2>

    <!-- Mostrar mensaje de éxito si existe -->
    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <!-- Botón para crear un nuevo puesto -->
    <a href="{{ route('puestos.crear') }}">➕ Nuevo Puesto</a>

    <!-- Tabla que muestra los registros -->
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Funciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($puestos as $p)
                <tr>
                    <td>{{ $p->nombre }}</td>
                    <td>{{ $p->descripcion }}</td>
                    <td>{{ $p->funciones }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
