<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Puesto</title>
    <style>
        /* === Estilos del formulario === */
        body { font-family: Arial, sans-serif; background: #f9f9f9; padding: 40px; }
        .form-container {
            background: white; border: 2px solid #ccc; border-radius: 8px;
            max-width: 600px; margin: auto; padding: 30px;
        }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input[type=text], textarea {
            width: 100%; padding: 8px; border: 1px solid #aaa; border-radius: 4px;
        }
        button {
            margin-top: 20px; background-color: #007bff; color: white;
            border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;
        }
        button:hover { background-color: #0056b3; }
        a { text-decoration: none; color: #007bff; font-weight: bold; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>🆕 Crear Puesto</h2>

    <!-- Formulario para crear un nuevo puesto -->
    <form action="{{ route('puestos.guardar') }}" method="POST">
        @csrf <!-- Protección contra ataques CSRF -->

        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Descripción:</label>
        <textarea name="descripcion"></textarea>

        <label>Funciones:</label>
        <textarea name="funciones"></textarea>

        <button type="submit">Guardar</button>
    </form>

    <br>
    <!-- Enlace para regresar al listado -->
    <a href="{{ route('puestos.index') }}">⬅ Volver al Listado</a>
</div>

</body>
</html>
