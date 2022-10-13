<?php

use App\Http\Controllers\AdministradorAutorController;
use App\Http\Controllers\AdministradorInicioController;
use App\Http\Controllers\AdministsradorProyectoController;
use App\Http\Controllers\AutorInicioController;
use App\Http\Controllers\AutorProyectoController;
use App\Http\Controllers\AutorProyectoEntradaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rutas de creacion de panel para los usuarios

//rutas USUARIOS
Route::get('/', function () {
    return view('index');
});

//Rutas Autores
Route::get('autores',[AutorInicioController::class,'index'])->name('autores.inicio');
Route::resource('autores/entradas',AutorProyectoEntradaController::class)->names('autores.entradas');
Route::resource('autores/proyectos',AutorProyectoController::class)->names('autores.proyectos');

//RUtas de Administrador
Route::get('administradores',[AdministradorInicioController::class,'index'])->name('administradores.inicio');
Route::resource('administradores/autores',AdministradorAutorController::class)->names('administradores.autores');
Route::resource('administradores/proyectos',AdministsradorProyectoController::class)->names('administradores.proyectos');
