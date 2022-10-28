@extends('adminlte::page')
@section('title', 'Administrador | Nuevo')
@section('content_header')
    <h1>Nuevo Usuario</h1>
@stop
@section('content')
{!! Form::model($user, ['route'=>['dashboard.administrators.update',$user->id],'method'=>'PUT']) !!}
    <div class="row">
        <div class="col-sm-12 col-sm-7 col-lg-7">
            <div class="form-group">
                <label for="">
                   <i class="fas fa-file-signature"></i> Nombre
                </label>
                {!! Form::text('name', null, ['class'=>'form-control','required' ]) !!}
                @error('name')
                    <small class="alert alert-danger d-block p-1 mt-1" role="alert">
                        <i class="fas fa-exclamation-triangle"> </i> {{ $message }}
                    </small>
                @enderror
                <label class="mt-2" for="">
                   <i class="fas fa-envelope"></i> Email
                </label>
                {!! Form::email('email', null, ['class'=>'form-control','required']) !!}
                @error('email')
                    <small class="alert alert-danger d-block p-1 mt-1" role="alert">
                        <i class="fas fa-exclamation-triangle"> </i> {{ $message }}
                    </small>
                @enderror
                <label class="mt-2" for="">
                    <i class="fas fa-key"></i> Contraseña
                </label>
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
                <label class="mt-2" for="">
                    <i class="fas fa-keyboard"></i>
                    Tipo
                </label>
                {!! Form::select('tipo', $tipos, null, ['class'=>'form-control']) !!}
                <label class="mt-2" for="">Sexo</label>
                @foreach ($sexos as $sexo)
                    <div class="form-check">
                        <input class="form-check-input" value="{{ $sexo }}" type="radio" name="sexo" id="sexo" @if($user->sexo == $sexo) checked @endif>
                        <label class="form-check-label" for="sexo">
                        {{ $sexo }}
                        </label>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary mt-3" id="btn">
                   <i class="fas fa-save"></i> Guardar
                </button>
            </div>
        </div>
    </div>
{!! Form::close() !!}
@stop