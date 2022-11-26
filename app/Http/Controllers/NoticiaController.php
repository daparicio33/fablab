<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use App\Models\Imagene;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
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
        $noticias = Noticia::orderBy('id','desc')->get();
        return view('dashboard.noticias.index',compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $etiquetas = Etiqueta::all();
        return view('dashboard.noticias.create',compact('etiquetas'));
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
            $noticia = new Noticia;
            $noticia->titulo = $request->titulo;
            $noticia->fecha = $request->fecha;
            $noticia->texto = $request->texto;
            $noticia->user_id = auth()->id();
            $noticia->save();
            //agregando las etiquetas
            $noticia->syncetiquetas($request->etiquetas);
            //agregando la imagen
            if ($request->hasFile('url')){
                $url = Storage::put('public/img/noticias',$request->url);
                $imagen = new Imagene;
                $imagen->url = $url;
                $imagen->noticia_id = $noticia->id;
                $imagen->save();
            }else{
                $imagen = new Imagene;
                $imagen->url = 'public/img/noticias/fab01.jpg';
                $imagen->noticia_id = $noticia->id;
                $imagen->save();
            }
            //grabando las etiquetas;
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return Redirect::route('dashboard.noticias.index')->with('error','no se registro la noticia correctamente');
        }
        return Redirect::route('dashboard.noticias.index')->with('info','se registro la noticia correctamente');
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
