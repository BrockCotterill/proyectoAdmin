<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\login;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::resource('puesto',PuestoController::class);
Route::resource('empleado',EmpleadoController::class);
Route::resource('departamento',DepartamentoController::class);
Route::post('login', [login::class, 'index']);
Route::get('departamento/ordenar/showOrdenadosPorNombre', [DepartamentoController::class, 'showOrdenadosPorNombre']);
Route::get('empleado/ordenar/showOrdenadosPorNombre', [EmpleadoController::class, 'showOrdenadosPorNombre']);
Route::get('puesto/ordenar/showOrdenadosPorNombre', [PuestoController::class, 'showOrdenadosPorNombre']);

Route::get('departamento/ordenar/showOrdenadosPorNombre2', [DepartamentoController::class, 'showOrdenadosPorNombre2']);
Route::get('empleado/ordenar/showOrdenadosPorNombre2', [EmpleadoController::class, 'showOrdenadosPorNombre2']);
Route::get('puesto/ordenar/showOrdenadosPorNombre2', [PuestoController::class, 'showOrdenadosPorNombre2']);