@extends('adminlte::page')

@section('title', 'Dashboard Administrador')

@section('content_header')
    <h1>Dashboard Administración</h1>
    <a href="{{ route('dashboard.administrators.create') }}">
        <button class="btn btn-success">
            <i class="fas fa-user-friends"></i> Nuevo Usuario
        </button>
    </a>
    @include('layouts.info')
@stop
@section('content')
    <p>Bienvenido al panel: mostranto usuarios del sistema</p>
    <div class="table-responsive-sm">
        <table class="table">
            <thead>
                <tr>
                    <td>Foto</td>
                    <td>Nombre</td>
                    <td>Correo</td>
                    <td>Tipo</td>
                    <td>Sexo</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>
                        <img class="rounded mx-auto d-block" style="width: 70px" src="{{ Storage::url($user->foto) }}" alt="">
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->tipo }}</td>
                    <td>{{ $user->sexo }}</td>
                    <td>
                        <a href="{{ route('dashboard.administrators.edit',$user->id) }}" title="Editar usuario" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="" data-target="#modal-delete-{{$user->id}}" data-toggle="modal" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @include('dashboard.administrator.modal')
                @endforeach
            </tbody>
        </table>
    </div>
@stop