<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Empleado
 * Representa la tabla 'empleados'.
 */
class Empleado extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional)
    protected $table = 'empleados';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'codigo_empleado',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'fecha_nacimiento',
        'sexo',
        'dni',
        'rtn',
        'nacionalidad',
        'tipo_sangre',
        'direccion',
        'referencia_domicilio',
        'celular',
        'telefono_fijo',
        'nivel_educativo',
        'titulo_obtenido',
        'estado_civil',
        'foto_path',
        'contacto1_nombre',
        'contacto1_telefono',
        'contacto1_parentesco',
        'contacto2_nombre',
        'contacto2_telefono',
        'contacto2_parentesco',
        'beneficiarios',
    ];

    // Si quieres que 'beneficiarios' se convierta automáticamente a array al leer/escribir:
    protected $casts = [
        'beneficiarios' => 'array',
    ];
}
