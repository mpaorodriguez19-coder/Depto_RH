<?php

namespace App\Http\Controllers;

use App\Models\Puesto; // Importamos el modelo
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    // 🔹 Muestra la lista de puestos
    public function index()
    {
        $puestos = Puesto::all(); // Obtenemos todos los registros de la tabla puestos
        return view('puestos.listado', compact('puestos')); // Enviamos los datos a la vista listado.blade.php
    }

    // 🔹 Muestra el formulario para crear un nuevo puesto
    public function crear()
    {
        return view('puestos.crear'); // Retorna la vista del formulario
    }

    // 🔹 Guarda el nuevo puesto en la base de datos
    public function guardar(Request $request)
    {
        // Validación de los campos enviados desde el formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'funciones' => 'nullable|string',
        ]);

        // Creamos un nuevo registro en la base de datos
        Puesto::create($request->all());

        // Redirigimos al listado con un mensaje de éxito
        return redirect()->route('puestos.index')->with('success', '✅ Puesto creado correctamente.');
    }
}

