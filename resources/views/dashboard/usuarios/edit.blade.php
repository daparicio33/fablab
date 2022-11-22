@extends('adminlte::page')
@section('title', 'Dashboard | Perfil')
@section('content_header')
    <h1>Editar Perfil</h1>
    @if (session('info'))
        <div class="alert alert-success mt-3" id='info'>
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger mt-3" id='error'>
            <strong>{{session('error')}}</strong>
        </div>
    @endif
@stop
@section('content')
{!! Form::model($user, ['route'=>['dashboard.users.update',$user->id],'id'=>'frm','method'=>'PUT','enctype'=>'multipart/form-data']) !!}
    <p>Edita tu perfil segun tus preferencias.</p>
    <div class="row">
        <div class="col-sm-12 col-sm-7 col-lg-7">
            <h4>Datos</h4>
            <div class="form-group">
                <label for="">
                   <i class="fas fa-file-signature"></i> Nombre
                </label>
                {!! Form::text('name', null, ['class'=>'form-control','required' ]) !!}
                <label class="mt-2" for="">
                   <i class="fas fa-envelope"></i> Email
                </label>
                {!! Form::email('email', null, ['class'=>'form-control','required']) !!}
                <label class="mt-2" for="">
                   <i class="fas fa-photo-video"></i> Foto
                </label>
                <input type="file" name="foto" class="form-control" id="url{{ $user->id }}" onchange="previewimage(event,'#imgpreview{{ $user->id }}')">                
                <label class="mt-2" for="">
                   <i class="fab fa-facebook"></i> Facebook
                </label>
                {!! Form::text('facebook', null, ['class'=>'form-control']) !!}
                <label class="mt-2" for="">
                   <i class="fab fa-instagram"></i> Instagram
                </label>
                {!! Form::text('instagram', null, ['class'=>'form-control']) !!}
                <label class="mt-2" for="">
                   <i class="fab fa-youtube"></i> Youtube
                </label>
                {!! Form::text('youtube', null, ['class'=>'form-control']) !!}
                <label class="mt-2" for="">
                  <i class="fas fa-align-justify"></i> Descripcion
                </label>
                {!! Form::textarea('descripcion', null, ['class'=>'form-control']) !!}
                <button type="submit" class="btn btn-primary btn-lg mt-3" id="btn">
                   <i class="fas fa-save"></i> Actualizar
                </button>
            </div>
        </div>
        <div class="col-sm-12 col-sm-5 col-lg-5">
            <h4>Foto</h4>
            <img id="imgpreview{{ $user->id }}" width="60%" style="border: 1px solid black" class="rounded mx-auto d-block" src="{{ Storage::url($user->foto) }}" alt="">
        </div>
    </div>
@stop