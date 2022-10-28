<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $tipos;
    protected $sexos;
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->tipos = [
            'Superadmin'=>'Superadmin',
            'Admin'=>'Admin',
            'Usuario'=>'Usuario'
        ];
        $this->sexos = [
            'Masculino',
            'Femenino'
        ]; 
        $this->middleware('can:dashboard.administrators.index')->only('index');
        $this->middleware('can:dashboard.administrators.edit')->only('edit','update');
        $this->middleware('can:dashboard.administrators.create')->only('create','store');
        $this->middleware('can:dashboard.administrators.destroy')->only('destroy');
        $this->middleware('can:dashboard.administrators.show')->only('show');
    }
    public function index()
    {
        //
        $users = User::orderBy('id','desc')->get();
        return view('dashboard.administrator.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipos = $this->tipos;
        $sexos = $this->sexos;
        return view('dashboard.administrator.create',compact('tipos','sexos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validando datos
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password'=>'required|min:8'
        ]);
        try {
            //guardando
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->tipo = $request->tipo;
            $user->sexo = $request->sexo;
            $user->password = bcrypt($request->password);
            $user->save();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('dashboard.administrators.index')
            ->with('error',$th->getMessage());
        }
        return Redirect::route('dashboard.administrators.index')
        ->with('info','los datos se guardaron correctamente');
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
        $tipos = $this->tipos;
        $sexos = $this->sexos;
        return view('dashboard.administrator.edit',compact('user','tipos','sexos'));

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
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        try {
            //guardando
            $user = User::findOrfail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->tipo = $request->tipo;
            $user->sexo = $request->sexo;
            if(isset($user->password)){
                $user->password = bcrypt($request->password);
            }
            $user->save();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('dashboard.administrators.index')
            ->with('error',$th->getMessage());
        }
        return Redirect::route('dashboard.administrators.index')
        ->with('info','los datos se actualizaron correctamente');
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
            $user = User::findOrFail($id);
            $user->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('dashboard.administrators.index')
            ->with('error',$th->getMessage());
        }
        return Redirect::route('dashboard.administrators.index')
        ->with('info','el usuario se elmino correctamente');
    }
}
