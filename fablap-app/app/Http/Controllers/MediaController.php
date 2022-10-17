<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMediaRequest;
use App\Models\Entrada;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMediaRequest $request)
    {
        //
        try {
            //code...
            if($request->hasFile('url'))
            {
                //guardando los archivos
                $url = $request->file('url')->store('public');
                //guardar el registro
                $media = new Media;
                $media->url = $url;
                $media->descripcion = $request->descripcion;
                $media->tipo = $request->tipo;
                $media->entrada_id = $request->entrada_id;
                $media->save();
            }else{
                $media = new Media;
                $media->url = $request->url;
                $media->descripcion = $request->descripcion;
                $media->tipo = $request->tipo;
                $media->entrada_id = $request->entrada_id;
                $media->save();
            }
        } catch (\Throwable $th) {
            //throw $th;
            
            return Redirect::to('dashboard/proyectos/'.$request->proyecto_id)
            ->with('error',$th->getMessage());

        }
        return Redirect::to('dashboard/proyectos/'.$request->proyecto_id)
        ->with('info','se guardo la imagen correctamente');
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
    }
}
