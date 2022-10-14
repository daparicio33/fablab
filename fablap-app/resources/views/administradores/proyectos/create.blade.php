@extends('adminlte::page')
@section('title', 'Crear Proyecto')
@section('content_header')
    <h1>
        <a href="{{ route('administradores.proyectos.index') }}" class="text-danger">
            <i class="fas fa-hand-point-left"></i>
        </a>
        Registar nuevo proyecto
    </h1>
    <p>
        <small>
            recuerde completar todos los campos para registrar el nuevo proyecto.
        </small>
    </p>
@stop
@section('content')
{!! Form::open(['route'=>'administradores.proyectos.store','id'=>'frm']) !!}
   <div class="row">
    <div class="col-sm-8 col-ml-7 col-xl-5 mx-auto">
        <div class="card text-start">
          <div class="card-body">
            <div class="form-group">
                {{-- campos de la tabla
                $table->string('nombre');
                $table->date('fecha');
                $table->longText('descripcion'); --}}
                {!! Form::label(null, 'Nombre', [null]) !!}
                {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
                {!! Form::label(null, 'Fecha', [null]) !!}
                {!! Form::date('fecha', null, ['class'=>'form-control']) !!}
                {!! Form::label(null, 'Descripcion', [null]) !!}
                {!! Form::textarea('descripcion', null, ['class'=>'form-control']) !!}
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