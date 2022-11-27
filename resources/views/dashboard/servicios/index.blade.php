@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1>Servicios</h1>
    <a href="{{ route('dashboard.servicios.create') }}">
        <button class="btn btn-success">
            <i class="fas fa-user-friends"></i> Nuevo Servicio
        </button>
    </a>    
    @include('layouts.info')
@stop
@section('content')
    <div class="table-responsive-sm">
        <table class="table">
            <thead>
                <tr>
                    <td>Icono</td>
                    <td>Nombre</td>
                    <td>Descripcion</td>
                    <td>Imagen</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($servicios as $servicio)
                <tr>
                    <td><i class="{{ $servicio->icon }}"></i></td>                    
                    <td>{{ $servicio->nombre }}</td>     
                    <td>{{ $servicio->descripcion }}</td>               
                    <td>
                        <img class="rounded mx-auto d-block" style="width: 70px" src="{{ Storage::url($servicio->url) }}" alt="">
                    </td>
                    <td style="width: 120px">
                        <a href="{{ route('dashboard.servicios.edit',$servicio->id) }}" title="Editar servicio" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="" data-target="#modal-delete-{{$servicio->id}}" title="Eliminar servicio" data-toggle="modal" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @include('dashboard.servicios.modal')
                @endforeach
            </tbody>
        </table>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
@stop