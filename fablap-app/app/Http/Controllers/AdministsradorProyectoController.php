<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class AdministsradorProyectoController extends Controller
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
        $proyectos = Proyecto::orderby('id','desc')
        ->get();
        return view('administradores.proyectos.index',compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('administradores.proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            $proyecto = new Proyecto;
            $proyecto->create($request->all());
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('administradores.proyectos.index')
            ->with('error',$th->getMessage());
        }
        return Redirect::route('administradores.proyectos.index')
        ->with('info','la informacion se guardo de forma correcta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('administradores.proyectos.edit',compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            //code...
            $proyecto = Proyecto::findOrFail($id);
            $proyecto->update($request->all());
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('administradores.proyectos.index')
            ->with('error',$th->getMessage());
        }
        return Redirect::route('administradores.proyectos.index')
        ->with('info','la informacion del proyecto se actualizo correctamente');
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
            return Redirect::route('administradores.proyectos.index')
            ->with('error',$th->getMessage());
        }
        return Redirect::route('administradores.proyectos.index')
        ->with('info','el proyecto se elmino correctamente');
    }
}
