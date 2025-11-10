<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Empleado</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background:#f7f7f7; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 20px; border-radius: 6px; }
        label { display:block; margin-top:10px; font-weight:bold; }
        input[type="text"], input[type="date"], select, textarea { width:100%; padding:8px; border:1px solid #ccc; border-radius:4px; }
        .row { display:flex; gap:10px; }
        .col { flex:1; }
        .small { width: 150px; }
        .btn { display:inline-block; background:#28a745;color:white;padding:8px 14px;border-radius:5px;text-decoration:none;border:0; cursor:pointer; }
        .btn-secondary { background:#6c757d; }
        .foto-preview { max-width:150px; max-height:150px; display:block; margin-top:8px; }
        .section { margin-top:20px; padding-top:10px; border-top:1px solid #eee; }
    </style>
</head>
<body>

<div class="container">
    <h2>Crear Empleado</h2>

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div style="background:#f8d7da;color:#721c24;padding:10px;border-radius:4px;">
            <strong>Errores:</strong>
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('empleados.guardar') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Código empleado y foto -->
        <div class="row">
            <div class="col">
                <label>Código del Empleado</label>
                <input type="text" name="codigo_empleado" value="{{ old('codigo_empleado') }}">
            </div>
            <div class="col small">
                <label>Foto</label>
                <input type="file" name="foto" accept="image/*">
                <small style="display:block;margin-top:4px;color:#666;">(Max 2MB)</small>
            </div>
        </div>

        <!-- Nombres y apellidos -->
        <div class="row">
            <div class="col">
                <label>Primer Nombre</label>
                <input type="text" name="primer_nombre" value="{{ old('primer_nombre') }}" required>
            </div>
            <div class="col">
                <label>Segundo Nombre</label>
                <input type="text" name="segundo_nombre" value="{{ old('segundo_nombre') }}">
            </div>
            <div class="col">
                <label>Primer Apellido</label>
                <input type="text" name="primer_apellido" value="{{ old('primer_apellido') }}" required>
            </div>
            <div class="col">
                <label>Segundo Apellido</label>
                <input type="text" name="segundo_apellido" value="{{ old('segundo_apellido') }}">
            </div>
        </div>

        <!-- Fecha, sexo, documentos -->
        <div class="row">
            <div class="col small">
                <label>Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
            </div>
            <div class="col small">
                <label>Sexo</label>
                <select name="sexo">
                    <option value="">--</option>
                    <option value="F" {{ old('sexo')=='F' ? 'selected':'' }}>F</option>
                    <option value="M" {{ old('sexo')=='M' ? 'selected':'' }}>M</option>
                </select>
            </div>
            <div class="col">
                <label>No. DNI</label>
                <input type="text" name="dni" value="{{ old('dni') }}">
            </div>
            <div class="col">
                <label>RTN</label>
                <input type="text" name="rtn" value="{{ old('rtn') }}">
            </div>
        </div>

        <!-- Estado civil, nacionalidad, tipo sangre -->
        <div class="row">
            <div class="col">
                <label>Estado Civil</label>
                <input type="text" name="estado_civil" value="{{ old('estado_civil') }}">
            </div>
            <div class="col">
                <label>Nacionalidad</label>
                <input type="text" name="nacionalidad" value="{{ old('nacionalidad') }}">
            </div>
            <div class="col">
                <label>Tipo de Sangre</label>
                <input type="text" name="tipo_sangre" value="{{ old('tipo_sangre') }}">
            </div>
        </div>

        <!-- Dirección y teléfonos -->
        <div class="section">
            <label>Dirección exacta</label>
            <textarea name="direccion" rows="2">{{ old('direccion') }}</textarea>

            <div class="row">
                <div class="col">
                    <label>Otra referencia de domicilio</label>
                    <input type="text" name="referencia_domicilio" value="{{ old('referencia_domicilio') }}">
                </div>
                <div class="col">
                    <label>No. Celular</label>
                    <input type="text" name="celular" value="{{ old('celular') }}">
                </div>
                <div class="col">
                    <label>No. Fijo Domicilio</label>
                    <input type="text" name="telefono_fijo" value="{{ old('telefono_fijo') }}">
                </div>
            </div>
        </div>

        <!-- Nivel educativo -->
        <div class="section">
            <label>Nivel Educativo</label>
            <input type="text" name="nivel_educativo" value="{{ old('nivel_educativo') }}">
            <label>Título Obtenido</label>
            <input type="text" name="titulo_obtenido" value="{{ old('titulo_obtenido') }}">
        </div>

        <!-- Contactos de emergencia -->
        <div class="section">
            <h4>Contactos de emergencia</h4>

            <div class="row">
                <div class="col">
                    <label>Nombre completo contacto (1)</label>
                    <input type="text" name="contacto1_nombre" value="{{ old('contacto1_nombre') }}">
                </div>
                <div class="col">
                    <label>Número de teléfono</label>
                    <input type="text" name="contacto1_telefono" value="{{ old('contacto1_telefono') }}">
                </div>
                <div class="col">
                    <label>Parentesco</label>
                    <input type="text" name="contacto1_parentesco" value="{{ old('contacto1_parentesco') }}">
                </div>
            </div>

            <div class="row" style="margin-top:10px;">
                <div class="col">
                    <label>Nombre completo contacto (2)</label>
                    <input type="text" name="contacto2_nombre" value="{{ old('contacto2_nombre') }}">
                </div>
                <div class="col">
                    <label>Número de teléfono</label>
                    <input type="text" name="contacto2_telefono" value="{{ old('contacto2_telefono') }}">
                </div>
                <div class="col">
                    <label>Parentesco</label>
                    <input type="text" name="contacto2_parentesco" value="{{ old('contacto2_parentesco') }}">
                </div>
            </div>
        </div>

        <!-- Beneficiarios: simple textarea JSON o formato libre -->
        <div class="section">
            <h4>Beneficiarios en caso de muerte (opcional)</h4>
            <small style="color:#777;">Puedes ingresar JSON con arreglo de beneficiarios
                (ej: [{"nombre":"Ana","porcentaje":50,"parentesco":"Hija","dni":"000"}]) 
                o dejar en blanco y administrar luego.</small>
            <textarea name="beneficiarios" rows="4" placeholder='[{"nombre":"Ana", "porcentaje":50, "parentesco":"Hija", "dni":"000"}]'>{{ old('beneficiarios') }}</textarea>
        </div>

        <!-- Botones -->
        <div style="margin-top:20px;">
            <button type="submit" class="btn">Guardar Empleado</button>
            <a href="{{ route('empleados.index') }}" class="btn btn-secondary" style="text-decoration:none;">Cancelar</a>
        </div>
    </form>
</div>

</body>
</html>
