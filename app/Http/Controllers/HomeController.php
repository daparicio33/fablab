<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use App\Models\Noticia;
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
    protected $tproyectos;
    protected $etiquetas;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->tproyectos = Tproyecto::orderBy('nombre','asc')->get();
        $this->etiquetas = Etiqueta::orderBy('nombre','asc')->get();
    }
    public function index()
    {
        $tproyectos = $this->tproyectos;
        //vamos a mandarlos los proyectos
        $proyectos = Proyecto::orderBy('id','desc')
        ->get();
        //mandamos las noticias
        $noticias = Noticia::orderBy('id','desc')
        ->get();
        return view('index',compact('proyectos','tproyectos','noticias'));
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
        $tproyectos = Tproyecto::orderBy('nombre','asc')->get();
        return view ('nosotros',compact('tproyectos'));
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
    public function noticiaIndex(){
        $noticias = Noticia::orderBy('id','desc')->get();
        $tproyectos = $this->tproyectos;
        $etiquetas = $this->etiquetas;
        return view('noticias.index',compact('noticias','tproyectos','etiquetas'));
    }
    public function noticiaShow($id){
        $tproyectos = $this->tproyectos;
        $etiquetas = $this->etiquetas;
        $etiquetas = Etiqueta::orderBy('nombre','asc')->get();
        $noticia = Noticia::findOrfail($id);
        return view('noticias.show',compact('noticia','tproyectos','etiquetas'));
    }
}
