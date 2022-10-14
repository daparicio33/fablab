@extends('adminlte::page')

@section('title', 'Administrador -> Autores')

@section('content_header')
    <h1>
        <a href="{{ route('administradores.autores.index') }}" class="text-danger">
            <i class="fas fa-hand-point-left"></i>
        </a>
        Registar nuevo autor
    </h1>
    <p>
        <small>
            recuerde completar todos los campos para registrar a un usuario.
        </small>
    </p>
@stop
@section('content')
   <div class="row">
    <div class="col-sm-8 col-ml-7 col-xl-5 mx-auto">
        <div class="card text-start">
          <div class="card-body">
            <div class="form-group">
                {{-- datos de un nuevo usuario del sistema --}}
                {{-- <label for="">Usuario</label>
                {!! Form::select('user_id',$users, null, ['class'=>'form-control']) !!} --}}
                {!! Form::label(null, 'Nombre', [null]) !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                {!! Form::label(null, 'Email', [null]) !!}
                {!! Form::email('email', null, ['class'=>'form-control']) !!}
                {!! Form::label(null, 'Contraseña', [null]) !!}
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="" name="password" id="password">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary" onclick="mostrarContrasena()" type="button" id="btnpassword">
                        <i class="far fa-eye" id='iconpassword'></i>
                    </button>
                    </div>
                </div>
                <label for="">Proyecto</label>
                {!! Form::select('proyecto_id', $proyectos, null, ['class'=>'form-control']) !!}
                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fas fa-download"></i>
                    Guardar
                </button>
            </div>
          </div>
        </div>
    </div>
   </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop