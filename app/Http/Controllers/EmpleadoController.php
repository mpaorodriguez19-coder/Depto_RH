<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Mostrar listado de empleados
     */
    public function index(Request $request)
    {
        // opcional: agregar búsqueda / paginación según necesites
        $empleados = Empleado::orderBy('id', 'desc')->get();
        return view('empleados.listado', compact('empleados'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function crear()
    {
        return view('empleados.crear');
    }

    /**
     * Guardar empleado nuevo
     */
    public function guardar(Request $request)
    {
        // Validación de campos (ajusta reglas según necesites)
        $validated = $request->validate([
            'codigo_empleado' => 'nullable|string|max:50',
            'primer_nombre' => 'required|string|max:100',
            'segundo_nombre' => 'nullable|string|max:100',
            'primer_apellido' => 'required|string|max:100',
            'segundo_apellido' => 'nullable|string|max:100',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|in:F,M',
            'dni' => 'nullable|string|max:30',
            'rtn' => 'nullable|string|max:30',
            'nacionalidad' => 'nullable|string|max:100',
            'tipo_sangre' => 'nullable|string|max:10',
            'direccion' => 'nullable|string',
            'referencia_domicilio' => 'nullable|string|max:255',
            'celular' => 'nullable|string|max:30',
            'telefono_fijo' => 'nullable|string|max:30',
            'nivel_educativo' => 'nullable|string|max:100',
            'titulo_obtenido' => 'nullable|string|max:255',
            'estado_civil' => 'nullable|string|max:50',
            'foto' => 'nullable|image|max:2048', // foto: imagen, max 2MB
            'contacto1_nombre' => 'nullable|string|max:150',
            'contacto1_telefono' => 'nullable|string|max:50',
            'contacto1_parentesco' => 'nullable|string|max:80',
            'contacto2_nombre' => 'nullable|string|max:150',
            'contacto2_telefono' => 'nullable|string|max:50',
            'contacto2_parentesco' => 'nullable|string|max:80',
            'beneficiarios' => 'nullable|array', // si mandas beneficiarios en arreglo desde JS
        ]);

        // Si hay foto, la guardamos en storage/app/public/fotos_empleados
        $foto_path = null;
        if ($request->hasFile('foto')) {
            $foto_path = $request->file('foto')->store('fotos_empleados', 'public');
            // nota: ejecutar `php artisan storage:link` para que la carpeta sea accesible
        }

        // Preparamos datos a guardar
        $data = $validated;
        $data['foto_path'] = $foto_path;

        // Si beneficiarios vienen como campos individuales, podrías reconstruir aquí,
        // aquí asumimos que vienen como array JSON (ej: desde campos dinámicos JS).
        // Si no usas beneficiarios, $validated['beneficiarios'] estará nulo.

        // Guardar en la base de datos
        $empleado = Empleado::create($data);

        // Redirigir con mensaje
        return redirect()->route('empleados.index')->with('success', 'Empleado creado correctamente.');
    }
}
