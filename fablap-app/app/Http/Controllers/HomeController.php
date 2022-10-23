<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
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
        $proyectos = Proyecto::all();
        return view('index',compact('proyectos'));
    }
    public function proyectoShow($id){
        $proyecto = Proyecto::findOrFail($id);
        return view('proyectos.show',compact('proyecto'));
    }
    public function proyectoIndex(){
        $proyectos = Proyecto::all();
        return view('proyectos.index',compact('proyectos'));
    }
    public function nosotros(){
        return view ('nosotros');
    }
}
