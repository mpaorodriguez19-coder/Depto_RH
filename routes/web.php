<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaseController;
use App\Http\Controllers\PuestoController; // Importamos el controlador de puestos
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Aquí definimos las rutas de la aplicación. Cada ruta apunta
| a un método en un controlador y tiene un nombre asignado.
*/

// Página principal: muestra el listado de pases
Route::get('/', [PaseController::class, 'listado'])
    ->name('pases.listado');

// Formulario para crear un nuevo pase
Route::get('/crear', [PaseController::class, 'crear'])
    ->name('pases.crear');

// Guardar el nuevo pase en la base de datos
Route::post('/guardar', [PaseController::class, 'guardar'])
    ->name('pases.guardar');

// Ruta para mostrar la lista de puestos
Route::get('/puestos', [PuestoController::class, 'index'])
    ->name('puestos.index');

// Ruta para mostrar el formulario de creación de puestos
Route::get('/puestos/crear', [PuestoController::class, 'crear'])
    ->name('puestos.crear');

// Ruta para guardar el nuevo puesto
Route::post('/puestos/guardar', [PuestoController::class, 'guardar'])
    ->name('puestos.guardar');

// Ruta para mostrar la lista de puestos
Route::get(uri: '/puestos', action: [PuestoController::class, 'index'])->name(name: 'puestos.index');






