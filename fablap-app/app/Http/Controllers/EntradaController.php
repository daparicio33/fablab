<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntradaRequest;
use App\Models\Entrada;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EntradaController extends Controller
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
        /* $entradas = Entrada::all();
        return view('dashboard.entradas.create',compact('entradas')); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $proyecto = Proyecto::findOrFail($request->proyecto_id);
        return view('dashboard.entradas.create',compact('proyecto'));
        dd($proyecto);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntradaRequest $request)
    {
        //
        try {
            //code...
            $entrada = new Entrada;
            $entrada->create($request->all());
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('dashboard.proyectos.show',$request->proyecto_id)
            ->with('error',$th->getMessage());
        }
        return Redirect::route('dashboard.proyectos.show',$request->proyecto_id)
        ->with('info','se guardo la informacion de la entrada correctamente');
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
        $entrada = Entrada::findOrFail($id);
        return view('dashboard.entradas.edit',compact('entrada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEntradaRequest $request, $id)
    {
        //
        try {
            //code...
            $entrada = Entrada::findOrFail($id);
            $entrada->update($request->all());
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('dashboard.proyectos.show',$entrada->proyecto_id)
            ->with('error',$th->getMessage());
        }
        return Redirect::route('dashboard.proyectos.show',$entrada->proyecto_id)
        ->with('info','la informacion de la entrada se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            //code...
            $entrada = Entrada::findOrFail($id);
            $entrada->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('dashboard.proyectos.show',$entrada->proyecto_id)
            ->with('error',$th->getMessage());
        }
        return Redirect::route('dashboard.proyectos.show',$entrada->proyecto_id)
        ->with('info','la entrada se elimino correctamente');
    }
}
