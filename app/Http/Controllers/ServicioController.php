<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
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
        $servicios = Servicio::orderBy('id','desc')->get();
        return view('dashboard.servicios.index',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.servicios.create');
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
            DB::beginTransaction();
            $servicio = new Servicio;
            $servicio->nombre = $request->nombre;
            $servicio->descripcion = $request->descripcion;
            $servicio->icon = $request->icon;
            if($request->hasFile('url')){
                $url = Storage::put('public/img/servicios',$request->url);
                $servicio->url = $url;
            }else{
                $servicio->url = 'public/img/servicios/servicio01.jpg';
            }
            $servicio->save();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th->getMessage());
            return Redirect::route('dashboard.servicios.index')
            ->with('error','no se guardo el servicio correctamente');
        }
        return Redirect::route('dashboard.servicios.index')
        ->with('info','se registro el servicio correctamente');
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
        $servicio = Servicio::findOrFail($id);
        return view('dashboard.servicios.edit',compact('servicio'));
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
            DB::beginTransaction();
            $servicio = Servicio::findOrFail($id);
            $servicio->nombre = $request->nombre;
            $servicio->descripcion = $request->descripcion;
            $servicio->icon = $request->icon;
            if($request->hasFile('url')){
                $url = Storage::put('public/img/servicios',$request->url);
                $servicio->url = $url;
            }
            $servicio->save();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th->getMessage());
            return Redirect::route('dashboard.servicios.index')
            ->with('error','no se actualizo el servicio correctamente');
        }
        return Redirect::route('dashboard.servicios.index')
        ->with('info','se actualizo el servicio correctamente');
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
            $servicio = Servicio::findOrFail($id);
            $servicio->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('dashboard.servicios.index')
            ->with('error','no se elimino el servicio correctamente');
        }
        return Redirect::route('dashboard.servicios.index')
        ->with('info','se elimino el servicio correctamente');
    }
}
