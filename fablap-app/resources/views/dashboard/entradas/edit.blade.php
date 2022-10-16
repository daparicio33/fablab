@extends('adminlte::page')
@section('title', 'Crear | Entrada')
@section('content_header')
    <h1>
        <a href="{{ route('dashboard.proyectos.show',$entrada->proyecto_id) }}" class="text-danger">
            <i class="fas fa-hand-point-left"></i>
        </a>
        Registar nueva entrada
    </h1>
    <p>
        <small>
            recuerde completar todos los campos para registrar a un usuario.
        </small>
    </p>
@stop
@section('content')
{{-- {!! Form::open(['route'=>'dashboard.entradas.store','id'=>'frm']) !!} --}}
{!! Form::model($entrada, ['route'=>['dashboard.entradas.update',$entrada->id],'method'=>'PUT']) !!}
   <div class="row">
    <div class="col-sm-8 col-ml-7 col-xl-5 mx-auto">
        <div class="card text-start">
          <div class="card-body">
            <div class="form-group">
                {!! Form::label(null, 'Titulo', [null]) !!}
                {!! Form::text('titulo', null, ['class'=>'form-control']) !!}
                @error('titulo')
                    <small class="alert alert-danger d-block p-1 mt-1" role="alert">
                        <i class="fas fa-exclamation-triangle"> </i> {{ $message }}
                    </small>
                @enderror
                {!! Form::label(null, 'Fecha', [null]) !!}
                {!! Form::date('fecha', null, ['class'=>'form-control']) !!}
                @error('fecha')
                    <small class="alert alert-danger d-block p-1 mt-1" role="alert">
                        <i class="fas fa-exclamation-triangle"> </i> {{ $message }}
                    </small>
                @enderror
                {!! Form::label(null, 'Descripcion', [null]) !!}
                {!! Form::textarea('descripcion', null, ['class'=>'form-control']) !!}
                @error('descripcion')
                    <small class="alert alert-danger d-block p-1 mt-1" role="alert">
                        <i class="fas fa-exclamation-triangle"> </i> {{ $message }}
                    </small>
                @enderror
                {!! Form::hidden('proyecto_id', $entrada->proyecto_id, [null]) !!}
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