<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pase extends Model
{
    use HasFactory;

    /**
     * Nombre de la tabla.
     */
    protected $table = 'pases';

    /**
     * Campos permitidos para asignación masiva.
     */
    protected $fillable = [
        'nombre_empleado',
        'numero_empleado',
        'departamento',
        'fecha',
        'asunto',
        'razon_laboral',
        'hora_salida',
        'hora_entrada',
        'tiempo_tomado',
    ];
}


