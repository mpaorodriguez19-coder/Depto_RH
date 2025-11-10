<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaseController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\EmpleadoController;

/*
|--------------------------------------------------------------------------
| RUTAS WEB DEL PROYECTO
|--------------------------------------------------------------------------
| Aquí se registran todas las rutas que manejarán las vistas del sistema.
| Cada ruta está asociada a un método del controlador correspondiente.
| 
| Notas:
| - 'name()' define un alias para usar en las vistas (route('nombre.alias'))
| - 'get' se usa para mostrar vistas
| - 'post' para guardar datos
*/

/* RUTAS PARA PASES */

// Listado principal de pases (vista inicial)
Route::get('/', [PaseController::class, 'listado'])->name('pases.listado');

// Mostrar formulario para crear un nuevo pase
Route::get('/pases/crear', [PaseController::class, 'crear'])->name('pases.crear');

// Guardar un nuevo pase en la base de datos
Route::post('/pases/guardar', [PaseController::class, 'guardar'])->name('pases.guardar');


/* RUTAS PARA PUESTOS */

// Listado de todos los puestos registrados
Route::get('/puestos', [PuestoController::class, 'index'])->name('puestos.index');

// Mostrar formulario para crear un nuevo puesto
Route::get('/puestos/crear', [PuestoController::class, 'crear'])->name('puestos.crear');

// Guardar el nuevo puesto en la base de datos
Route::post('/puestos/guardar', [PuestoController::class, 'guardar'])->name('puestos.guardar');


/* RUTAS PARA EMPLEADOS */

// Listado de empleados
Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');

// Formulario para crear empleado
Route::get('/empleados/crear', [EmpleadoController::class, 'crear'])->name('empleados.crear');

// Guardar empleado (POST)
Route::post('/empleados/guardar', [EmpleadoController::class, 'guardar'])->name('empleados.guardar');







