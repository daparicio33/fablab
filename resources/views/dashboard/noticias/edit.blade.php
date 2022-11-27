@extends('adminlte::page')
@section('title', 'Editar | Noticia')
@section('content_header')
    <h1>
        <a href="{{ route('dashboard.noticias.index') }}" class="text-danger">
            <i class="fas fa-hand-point-left"></i>
        </a>
        Editar Noticia
    </h1>
    <p>
        <small>
            recuerde completar todos los campos para registrar las noticias.
        </small>
    </p>
@stop
@section('content')
@section('plugins.Summernote', true)
{!! Form::model($noticia, ['route'=>['dashboard.noticias.update',$noticia->id],'id'=>'frm','enctype'=>'multipart/form-data','method'=>'PUT']) !!}
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
                {!! Form::label(null, 'Texto corto', [null]) !!}
                {!! Form::textarea('texto', null, ['class'=>'form-control','rows'=>'3']) !!}
                @error('texto')
                    <small class="alert alert-danger d-block p-1 mt-1" role="alert">
                        <i class="fas fa-exclamation-triangle"> </i> {{ $message }}
                    </small>
                @enderror
                @php
                $config = [
                    "height" => "300",
                    "toolbar" => [
                        // [groupName, [list of button]]
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']],
                    ],
                ]
                @endphp
                <x-adminlte-text-editor name="contenido" label="Contenido" label-class="text-danger"
                    igroup-size="sm" placeholder="Write some text..." :config="$config">
                    {{ $noticia->contenido }}
                </x-adminlte-text-editor>
                {!! Form::label(null, 'Imagen', [null]) !!}
                <input type="file" name="url" id="url" class="form-control mb-4" onchange="previewimage(event,'#imgpreview')">
                <div class="col-sm-12 col-md-4 mx-auto">
                    <img src="" id="imgpreview" width="90%" alt="imagen no disponible">
                </div>
                @error('contenido')
                    <small class="alert alert-danger d-block p-1 mt-1" role="alert">
                        <i class="fas fa-exclamation-triangle"> </i> {{ $message }}
                    </small>
                @enderror
                {!! Form::label(null, 'Etiquetas', [null]) !!}
                @foreach ($etiquetas as $etiqueta)
                    @php
                        $existe = existeEtiqueta($etiqueta->id,$noticia->id);
                    @endphp
                    <div class="form-check">
                        {!! Form::checkbox('etiquetas[]', $etiqueta->id,$existe, ['class'=>'form-check-input']) !!}
                        <label class="form-check-label">
                            {{$etiqueta->nombre}}
                        </label>
                    </div>
                @endforeach
                @error('etiquetas')
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
{!! Form::close() !!}
@stop