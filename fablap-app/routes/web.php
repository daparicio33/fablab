<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\UserController;
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
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('proyectos/{id}',[HomeController::class,'proyectoShow'])->name('home.proyectos.show');
Route::get('proyectos/',[HomeController::class,'proyectoIndex'])->name('home.proyectos');
Route::get('nosotros/',[HomeController::class,'nosotros'])->name('home.nosotros');

//Rutas de los creadores del Fablab
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');
Route::resource('dashboard/proyectos',ProyectoController::class)
->names('dashboard.proyectos');
Route::resource('dashboard/entradas',EntradaController::class)
->names('dashboard.entradas');
Route::resource('dashboard/medias',MediaController::class)
->names('dashboard.medias');
Route::get('calculadora',function(){
    return view('calculadora');
});
//Rutas de usuario
Route::resource('dashboard/users', UserController::class)
->names('dashboard.users');
//Rutas Autores
/* Route::get('autores',[AutorInicioController::class,'index'])
->name('autores.inicio');
Route::resource('autores/entradas',AutorProyectoEntradaController::class)
->names('autores.entradas');
Route::resource('autores/proyectos',AutorProyectoController::class)
->names('autores.proyectos');

//RUtas de Administrador
Route::get('administradores',[AdministradorInicioController::class,'index'])
->name('administradores.inicio');
Route::resource('administradores/autores',AdministradorAutorController::class)
->names('administradores.autores');
Route::resource('administradores/proyectos',AdministsradorProyectoController::class)
->names('administradores.proyectos'); */
