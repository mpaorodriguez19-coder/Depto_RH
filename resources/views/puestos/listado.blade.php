<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Puestos</title>
    <style>
        /* === ESTILOS GENERALES === */
        body { font-family: Arial, sans-serif; padding: 20px; background: #f8f9fa; }
        h2 { color: #333; }

        /* Botones */
        .btn {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            color: white;
            margin-right: 5px;
        }

        .btn-green { background-color: #28a745; }
        .btn-green:hover { background-color: #218838; }

        /* Tabla */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }

        /* Mensaje de éxito */
        .success { background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px; }

        /* Buscador */
        form { margin-bottom: 15px; display: flex; align-items: center; gap: 10px; }
        input[type="text"] { padding: 8px; width: 250px; border: 1px solid #ccc; border-radius: 5px; }
        button[type="submit"] {
            background-color: #28a745;
            border: none;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover { background-color: #218838; }
    </style>
</head>
<body>

    <!-- 🔙 Volver al listado de Pases -->
    <a href="{{ route('pases.listado') }}" class="btn btn-green">← Volver al listado de Pases</a>

    <h2>Listado de Puestos</h2>

    <!-- ✅ Mostrar mensaje de éxito -->
    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <!-- 🔍 FORMULARIO DE BÚSQUEDA -->
    <form action="{{ route('puestos.index') }}" method="GET">
        <input 
            type="text" 
            name="buscar" 
            placeholder="Buscar por nombre..." 
            value="{{ old('buscar', $buscar) }}"
        >
        <button type="submit">Buscar</button>

        <!-- 🔄 Botón de refrescar para mostrar todos los puestos -->
        <a href="{{ route('puestos.index') }}" class="btn btn-green">Refrescar</a>
    </form>

    <!-- ➕ Botón para crear nuevo puesto -->
    <a href="{{ route('puestos.crear') }}" class="btn btn-green">➕ Nuevo Puesto</a>

    <!-- 📄 Tabla de puestos -->
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Funciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($puestos as $p)
                <tr>
                    <td>{{ $p->nombre }}</td>
                    <td>{{ $p->descripcion }}</td>
                    <td>{{ $p->funciones }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No se encontraron puestos con ese nombre.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>


