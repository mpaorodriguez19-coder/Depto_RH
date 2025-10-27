<?php

namespace App\Http\Controllers;

use App\Models\Puesto; // Importamos el modelo Puesto
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    /**
     * 🔹 Muestra la lista de puestos con opción de búsqueda.
     */
 public function index(Request $request)
{
    // Capturamos el texto que el usuario ingresa en el buscador
    $buscar = $request->input('buscar');

    // Si el usuario escribió algo, filtramos por coincidencia en el nombre
    // Si no escribió nada, mostramos todos los puestos
    $puestos = Puesto::when($buscar, function ($query, $buscar) {
        return $query->where('nombre', 'like', "%{$buscar}%");
    })->get();

    // Retornamos la vista con los resultados (y el texto buscado para mantenerlo en el input)
    return view('puestos.listado', compact('puestos', 'buscar'));
}


    /**
     * 🔹 Muestra el formulario para crear un nuevo puesto.
     */
    public function crear()
    {
        return view('puestos.crear'); // Retorna la vista del formulario
    }

    /**
     * 🔹 Guarda un nuevo puesto en la base de datos.
     */
    public function guardar(Request $request)
    {
        // ✅ Validamos los campos enviados desde el formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'funciones' => 'nullable|string',
        ]);

        // ✅ Creamos un nuevo registro en la tabla 'puestos'
        Puesto::create($request->all());

        // ✅ Redirigimos al listado con un mensaje de éxito
        return redirect()->route('puestos.index')->with('success', '✅ Puesto creado correctamente.');
    }
}