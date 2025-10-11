<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pase;

class PaseController extends Controller
{
    /**
     * Muestra el listado de pases guardados
     */
    public function listado()
    {
        // Obtener todos los pases desde la base de datos (más recientes primero)
        $pases = Pase::orderBy('created_at', 'desc')->get();

        // Retornar la vista con los pases
        return view('pases.listado', compact('pases'));
    }

    /**
     * Muestra el formulario para crear un nuevo pase
     */
    public function crear()
    {
        return view('pases.crear');
    }

    /**
     * Guarda un nuevo pase en la base de datos
     */
    public function guardar(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre_empleado' => 'required|string|max:100',
            'numero_empleado' => 'required|string|max:20',
            'departamento' => 'required|string|max:100',
            'fecha' => 'required|date',
            'asunto' => 'required|in:Personal,Laboral',
            'razon_laboral' => 'nullable|string|max:255',
            'hora_salida' => 'required',
            'hora_entrada' => 'required',
            'tiempo_tomado' => 'required|string|max:50',
        ]);

        // Crear un nuevo registro en la base de datos
        Pase::create($validated);

        // Redirigir al listado con mensaje de éxito
        return redirect()->route('pases.listado')->with('success', '✅ Pase guardado correctamente.');
    }
}


