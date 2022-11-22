<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
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
        $id = auth()->id();
        return Redirect::to('dashboard/users/'.$id.'/edit/');
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
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail($id);
        return view('dashboard.usuarios.edit',compact('user'));
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
        $user = User::findOrFail($id);
        if($request->hasFile('foto')){
            $foto = $request->file('foto')->store('public');
            $user->foto = $foto;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->facebook = $request->facebook;
            $user->instagram = $request->instagram;
            $user->youtube = $request->youtube;
            $user->descripcion = $request->descripcion;
            $user->save();
        }else{
            $user->name = $request->name;
            $user->email = $request->email;
            $user->facebook = $request->facebook;
            $user->instagram = $request->instagram;
            $user->youtube = $request->youtube;
            $user->descripcion = $request->descripcion;
            $user->save();
        }
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        return Redirect::route('dashboard.users.edit',$user->id)->with('erro',$th->getMessage());
    }
    return Redirect::route('dashboard.users.edit',$user->id)->with('info','se actualizo la informacion correctamente');
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
