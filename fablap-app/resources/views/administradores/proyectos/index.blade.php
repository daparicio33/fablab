@extends('adminlte::page')

@section('title', 'Administrador | Proyectos')

@section('content_header')
    <h1 class="mb-2">Lista de Proyectos del Sistema</h1>
    <a href="{{ route('administradores.proyectos.create') }}">
        <button class="btn btn-success">
            <i class="fab fa-product-hunt"></i>
            Nuevo Proyecto
        </button>
    </a>
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
    <div class="table-responsive-sm">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectos as $proyecto)
                    <tr>
                        <td>{{ $proyecto->nombre }}</td>
                        <td>{{ date('d-m-Y',strtotime($proyecto->fecha)) }}</td>
                        <td style="width: 170px; text-align: center">
                            <a href="{{ route('administradores.proyectos.edit',$proyecto->id) }}">
                                <button class="btn btn-info">
                                    <i class="far fa-edit"></i> Editar
                                </button>
                            </a>
                            <a data-target="#modal-delete-{{$proyecto->id}}" data-toggle="modal" href="" class="btn btn-danger" title="eliminar matricula">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        @include('administradores.proyectos.modal')
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop