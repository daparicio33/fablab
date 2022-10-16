@extends('adminlte::page')
@section('title', 'Registrar Proyecto')
@section('content_header')
    <h1>
        <a href="{{ route('dashboard.proyectos.index') }}" class="text-danger">
            <i class="fas fa-hand-point-left"></i>
        </a>
        Editar Proyecto
    </h1>
    <p>
        <small>
            recuerde completar todos los campos para registrar el nuevo proyecto.
        </small>
    </p>
@stop
@section('content')
{!! Form::model($proyecto, ['route'=>['dashboard.proyectos.update',$proyecto->id],'method'=>'PUT']) !!}
   <div class="row">
    <div class="col-sm-8 col-ml-7 col-xl-5 mx-auto">
        <div class="card text-start">
          <div class="card-body">
            <div class="form-group">
                {!! Form::label(null, 'Nombre', [null]) !!}
                {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
                @error('nombre')
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
                {!! Form::hidden('user_id', auth()->id(), [null]) !!}
                <button type="submit" id="btn" class="btn btn-primary mt-3">
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