<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory; // Permite usar las fábricas de Laravel

    // Nombre de la tabla (opcional si sigue la convención)
    protected $table = 'puestos';

    // Campos que se pueden llenar de forma masiva (mass assignment)
    protected $fillable = [
        'nombre',
        'descripcion',
        'funciones',
    ];
}
