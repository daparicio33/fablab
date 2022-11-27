@extends('adminlte::page')
@section('title', 'Editar | Servicio')
@section('content_header')
    <h1>
        <a href="{{ route('dashboard.servicios.index') }}" class="text-danger">
            <i class="fas fa-hand-point-left"></i>
        </a>
        Editar Servicio
    </h1>
    <p>
        <small>
            recuerde completar todos los campos para editar el servicio.
        </small>
    </p>
@stop
@section('content')
{!! Form::model($servicio, ['route'=>['dashboard.servicios.update',$servicio->id],'method'=>'PUT','id'=>'frm','enctype'=>'multipart/form-data']) !!}
   <div class="row">
    <div class="col-sm-12 col-ml-12 col-xl-12">
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
                {!! Form::label(null, 'Icono', [null]) !!}
                {!! Form::text('icon', null, ['class'=>'form-control']) !!}
                @error('icon')
                    <small class="alert alert-danger d-block p-1 mt-1" role="alert">
                        <i class="fas fa-exclamation-triangle"> </i> {{ $message }}
                    </small>
                @enderror
                {!! Form::label(null, 'Descripcion', [null]) !!}
                {!! Form::textarea('descripcion', null, ['class'=>'form-control','rows'=>'3']) !!}
                @error('descripcion')
                    <small class="alert alert-danger d-block p-1 mt-1" role="alert">
                        <i class="fas fa-exclamation-triangle"> </i> {{ $message }}
                    </small>
                @enderror
                {!! Form::label(null, 'Imagen', [null]) !!}
                <input type="file" name="url" id="url" class="form-control mb-4" onchange="previewimage(event,'#imgpreview')">
                <div class="col-sm-12 col-md-4 mx-auto">
                    <img src="" id="imgpreview" width="90%" alt="imagen no disponible">
                </div>
                <button type="submit" class="btn btn-primary mt-3" id="btn">
                    <i class="fas fa-download"></i>
                    Guardar
                </button>
          </div>
        </div>
    </div>
   </div>
{!! Form::close() !!}
@stop