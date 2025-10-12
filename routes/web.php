<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaseController;

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



