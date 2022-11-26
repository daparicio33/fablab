@extends('adminlte::page')
@section('title', 'Crear | Noticia')
@section('content_header')
    <h1>
        <a href="{{ route('dashboard.noticias.index') }}" class="text-danger">
            <i class="fas fa-hand-point-left"></i>
        </a>
        Registar nueva Noticia
    </h1>
    <p>
        <small>
            recuerde completar todos los campos para registrar las noticias.
        </small>
    </p>
@stop
@section('content')
@section('plugins.Summernote', true)
{!! Form::open(['route'=>'dashboard.noticias.store','id'=>'frm','enctype'=>'multipart/form-data']) !!}
   <div class="row">
    <div class="col-sm-12 col-ml-12 col-xl-12">
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
                {!! Form::label(null, 'Texto', [null]) !!}
                {!! Form::textarea('texto', null, ['class'=>'form-control']) !!}
                @error('texto')
                    <small class="alert alert-danger d-block p-1 mt-1" role="alert">
                        <i class="fas fa-exclamation-triangle"> </i> {{ $message }}
                    </small>
                @enderror
                {!! Form::label(null, 'Imagene', [null]) !!}
                <input type="file" name="url" id="url" class="form-control mb-4" onchange="previewimage(event,'#imgpreview')">
                <div class="col-sm-12 col-md-4 mx-auto">
                    <img src="" id="imgpreview" width="90%" alt="imagen no disponible">
                </div>
                {!! Form::label(null, 'Etiquetas', [null]) !!}
                @foreach ($etiquetas as $etiqueta)
                    <div class="form-check">
                        {!! Form::checkbox('etiquetas[]', $etiqueta->id,null, ['class'=>'form-check-input']) !!}
                        <label class="form-check-label">
                            {{$etiqueta->nombre}}
                        </label>
                    </div>
                @endforeach
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