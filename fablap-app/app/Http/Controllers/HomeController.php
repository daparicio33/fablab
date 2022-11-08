<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Tproyecto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* public function __construct()
    {
        $this->middleware('auth');
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //vamos a mandarlos los proyectos
        $tproyectos = Tproyecto::orderBy('nombre','asc')
        ->get();
        $proyectos = Proyecto::orderBy('id','desc')
        ->get();
        return view('index',compact('proyectos','tproyectos'));
    }
    public function proyectoShow($id){
        $proyecto = Proyecto::findOrFail($id);
        $tproyectos = Tproyecto::orderBy('nombre','asc')->get();
        return view('proyectos.show',compact('proyecto','tproyectos'));
    }
    public function proyectoIndex(){
        $proyectos = Proyecto::orderBy('id','desc')
        ->get();
        $tproyectos = Tproyecto::orderBy('nombre','asc')->get();
        return view('proyectos.index',compact('proyectos','tproyectos'));
    }
    public function nosotros(){
        return view ('nosotros');
    }
    public function contacto(){
        return view('contacto');
    }
    public function proyectoxcategoria($id){
        $tproyectos = Tproyecto::orderBy('nombre','asc')
        ->get();
        $proyectos = Proyecto::orderBy('id','desc')
        ->where('tproyecto_id','=',$id)
        ->get();
        $categoria = Tproyecto::findOrFail($id)->nombre;
        return view('proyectos.index',compact('proyectos','tproyectos','categoria'));
    }
}
