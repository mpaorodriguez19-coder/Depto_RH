<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pase de Salida</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 40px;
        }
        .form-container {
            background: white;
            border: 2px solid #c0c0c0;
            border-radius: 8px;
            max-width: 800px;
            margin: auto;
            padding: 30px;
        }
        h2 { text-align: center; font-weight: bold; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input[type=text], input[type=date], input[type=time] {
            width: 100%; padding: 8px; border: 1px solid #aaa; border-radius: 4px;
        }
        .radio-group { margin-top: 10px; }
        .radio-group label { font-weight: normal; margin-right: 20px; }
        button {
            margin-top: 20px; background-color: #007bff; color: white;
            border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;
        }
        button:hover { background-color: #0056b3; }
        .back-link {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>PASE DE SALIDA EDIFICIO MUNICIPAL</h2>

    <form action="{{ route('pases.guardar') }}" method="POST">
        @csrf

        <label>DE:</label>
        <input type="text" name="nombre_empleado" required>

        <label>No. de EMPLEADO:</label>
        <input type="text" name="numero_empleado" required>

        <label>DEPARTAMENTO ASIGNADO:</label>
        <input type="text" name="departamento" required>

        <label>FECHA:</label>
        <input type="date" name="fecha" required>

        <label>ASUNTO: SOLICITUD DE PERMISO</label>
        <div class="radio-group">
            <label><input type="radio" name="asunto" value="Personal" required> Personal</label>
            <label><input type="radio" name="asunto" value="Laboral" required> Laboral</label>
        </div>

        <label>RAZÓN EN CASO DE SER LABORAL:</label>
        <input type="text" name="razon_laboral">

        <label>HORA DE SALIDA:</label>
        <input type="time" name="hora_salida" required>

        <label>HORA DE ENTRADA:</label>
        <input type="time" name="hora_entrada" required>

        <label>TIEMPO TOMADO (HORA):</label>
        <input type="text" name="tiempo_tomado" required>

        <button type="submit">Guardar Pase</button>
    </form>

    <a href="{{ route('pases.listado') }}" class="back-link">← Volver al listado</a>
</div>

</body>
</html>
