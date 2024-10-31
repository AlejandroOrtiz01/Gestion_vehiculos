<?php

use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\VehiculoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Marcas
Route::get('/marcas', [MarcaController::class, 'index'])->middleware('auth')->name('marcas.index');
Route::get('/marcas/crear', [MarcaController::class, 'create'])->middleware('auth')->name('marcas.create');
Route::post('/marcas/store', [MarcaController::class, 'store'])->middleware('auth')->name('marcas.store');
Route::get('/marcas/{marca}/editar', [MarcaController::class, 'edit'])->middleware('auth')->name('marcas.edit');
Route::put('/marcas/{marca}/update', [MarcaController::class, 'update'])->middleware('auth')->name('marcas.update');

// Vehiculos
Route::get('/vehiculos', [VehiculoController::class, 'index'])->middleware('auth')->name('vehiculos.index');
Route::get('/vehiculos/crear', [VehiculoController::class, 'create'])->middleware('auth')->name('vehiculos.create');
Route::post('/vehiculos/store', [VehiculoController::class, 'store'])->middleware('auth')->name('vehiculos.store');
Route::get('/vehiculos/{vehiculo}/editar', [VehiculoController::class, 'edit'])->middleware('auth')->name('vehiculos.edit');
Route::put('/vehiculos/{vehiculo}/update', [VehiculoController::class, 'update'])->middleware('auth')->name('vehiculos.update');

// Mantenimientos
Route::get('/mantenimientos', [MantenimientoController::class, 'index'])->middleware('auth')->name('mantenimientos.index');
Route::get('/mantenimientos/create', [MantenimientoController::class, 'create'])->middleware('auth')->name('mantenimientos.create');
Route::post('/mantenimientos/create/store', [MantenimientoController::class, 'store'])->middleware('auth')->name('mantenimientos.store');
Route::get('/mantenimientos/{mantenimiento}/editar', [MantenimientoController::class, 'edit'])->middleware('auth')->name('mantenimientos.edit');
Route::put('/mantenimientos/{mantenimiento}/update', [MantenimientoController::class, 'update'])->middleware('auth')->name('mantenimientos.update');

// Ver mantenimientos por Vehiculo
Route::get('/vehiculos/{vehiculo}/mantenimientos', [VehiculoController::class, 'mantenimientos'])->middleware('auth')->name('vehiculos.mantenimientos');