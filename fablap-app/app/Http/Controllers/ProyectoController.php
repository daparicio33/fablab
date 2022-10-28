<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProyectoRequest;
use App\Models\Entrada;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $proyectos = Proyecto::where('user_id','=',auth()->id())
        ->orderBy('id','desc')
        ->get();
        return view('dashboard.proyectos.index',compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProyectoRequest $request)
    {
        //
        try {
            $proyecto = new Proyecto;
            if($request->hasFile('url')){
                $url = $request->file('url')->store('public');
                $proyecto->nombre = $request->nombre;
                $proyecto->descripcion = $request->descripcion;
                $proyecto->fecha = $request->fecha;
                $proyecto->user_id = auth()->id();
                $proyecto->url = $url;
                $proyecto->save();
            }else{
                $proyecto->create($request->all());
            }
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('dashboard.proyectos.index')
            ->with('error',$th->getMessage());
        }
        return Redirect::route('dashboard.proyectos.index')
        ->with('info','se registro el proyecto correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //mostrar las entradas del post
        $proyecto = Proyecto::findOrFail($id);
        $entradas = Entrada::where('proyecto_id','=',$proyecto->id)
        ->orderBy('id','desc')
        ->get();
        return view('dashboard.entradas.index',compact('proyecto','entradas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $proyecto = Proyecto::findOrFail($id);
        return view('dashboard.proyectos.edit',compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProyectoRequest $request, $id)
    {
        //
        try {
            //code...
            $proyecto = Proyecto::findOrFail($id);
            if($request->hasFile('url')){
                $url = $request->file('url')->store('public');
                $proyecto->nombre = $request->nombre;
                $proyecto->descripcion = $request->descripcion;
                $proyecto->fecha = $request->fecha;
                $proyecto->user_id = auth()->id();
                $proyecto->url = $url;
                $proyecto->update();
            }else{
                $proyecto->update($request->all());
            }
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('dashboard.proyectos.index')
            ->with('error',$th->getMessage());
        }
        return Redirect::route('dashboard.proyectos.index')
        ->with('info','se actualizo el proyecto de forma correcta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            //code...
            $proyecto = Proyecto::findOrFail($id);
            $proyecto->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('dashboard.proyectos.index')
            ->with('error',$th->getMessage());
        }
        return Redirect::route('dashboard.proyectos.index')
        ->with('info','se elmino el proyecto correctamente');
    }
}
