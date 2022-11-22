<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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


Auth::routes(["register" => false]);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//rutas de creacion de panel para los usuarios
//rutas USUARIOS
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('proyectos/{id}/categoria/',[HomeController::class,'proyectoxcategoria'])->name('home.proyectoxcategoria');
Route::get('proyectos/{id}',[HomeController::class,'proyectoShow'])->name('home.proyectos.show');
Route::get('proyectos/',[HomeController::class,'proyectoIndex'])->name('home.proyectos');
Route::get('nosotros/',[HomeController::class,'nosotros'])->name('home.nosotros');
Route::get('contacto/',[HomeController::class,'contacto'])->name('home.contacto');

//Rutas de los creadores del Fablab
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');
Route::resource('dashboard/proyectos',ProyectoController::class)
->names('dashboard.proyectos');
Route::resource('dashboard/entradas',EntradaController::class)
->names('dashboard.entradas');
Route::resource('dashboard/medias',MediaController::class)
->names('dashboard.medias');


/* Route::get('calculadora',function(){
    $users = User::all();
    return view('calculadora',compact('users'));
}); */
//Rutas de usuario
Route::resource('dashboard/users', UserController::class)
->names('dashboard.users');
//Rutas de Administrador
Route::resource('dashboard/administrators',AdministratorController::class)
->names('dashboard.administrators');


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
Route::get('clear-cache', function () {
    echo Artisan::call('config:clear');
    echo Artisan::call('config:cache');
    echo Artisan::call('cache:clear');
    echo Artisan::call('route:clear');
 });
 Route::get('storage',function(){
    echo Artisan::call('storage:link');
 });