<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaseController;
use App\Http\Controllers\PuestoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se definen las rutas principales del sistema de pases de salida.
|
*/

// Página principal: muestra el listado de pases
Route::get('/', [PaseController::class, 'listado'])->name('pases.listado');

// Formulario para crear un nuevo pase
Route::get('/crear', [PaseController::class, 'crear'])->name('pases.crear');

// Guardar el nuevo pase
Route::post('/guardar', [PaseController::class, 'guardar'])->name('pases.guardar');

// Ruta para mostrar la lista de puestos
Route::get('/puestos', [PuestoController::class, 'index'])->name('puestos.index');

// Ruta para mostrar el formulario de creación
Route::get('/puestos/crear', [PuestoController::class, 'crear'])->name('puestos.crear');

// Ruta para guardar el nuevo puesto
Route::post('/puestos/guardar', [PuestoController::class, 'guardar'])->name('puestos.guardar');



