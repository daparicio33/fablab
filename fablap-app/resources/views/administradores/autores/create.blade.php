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
{!! Form::open(['route'=>'administradores.autores.store','id'=>'frm']) !!}
   <div class="row">
    <div class="col-sm-8 col-ml-7 col-xl-5 mx-auto">
        <div class="card text-start">
          <div class="card-body">
            <div class="form-group">
                {!! Form::label(null, 'Nombre', [null]) !!}
                {!! Form::text('name', old('name'), ['class'=>'form-control']) !!}
                @error('name')
                    <small class="alert alert-danger d-block p-1 mt-1" role="alert">
                        <i class="fas fa-exclamation-triangle"> </i> {{ $message }}
                    </small>
                @enderror
                {!! Form::label(null, 'Email', [null]) !!}
                {!! Form::email('email', old('email'), ['class'=>'form-control']) !!}
                @error('email')
                    <small class="alert alert-danger d-block p-1 mt-1" role="alert">
                        <i class="fas fa-exclamation-triangle"> </i> {{ $message }}
                    </small>
                @enderror
                {!! Form::label(null, 'Contraseña', [null]) !!}
                <div class="input-group">
                    <input type="password" class="form-control" placeholder="" name="password" id="password">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary" onclick="mostrarContrasena()" type="button" id="btnpassword">
                        <i class="far fa-eye" id='iconpassword'></i>
                    </button>
                    </div>
                </div>
                @error('password')
                    <small class="alert alert-danger d-block p-1 mt-1" role="alert">
                        <i class="fas fa-exclamation-triangle"> </i> {{ $message }}
                    </small>
                @enderror
                <label for="">Proyecto</label>
                {!! Form::select('proyecto_id', $proyectos, null, ['class'=>'form-control']) !!}
                @error('proyecto_id')
                    <small class="alert alert-danger d-block p-1 mt-1" role="alert">
                        <i class="fas fa-exclamation-triangle"> </i> {{ $message }}
                    </small>
                @enderror
                <button type="submit" class="btn btn-primary mt-3" id="btn">
                    <i class="fas fa-download"></i>
                    Guardar
                </button>
            </div>
          </div>
        </div>
    </div>
   </div>
{!! Form::close() !!}
@stop