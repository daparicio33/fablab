@extends('adminlte::page')
@section('title', 'Dashboard | Proyectos')
@section('content_header')
    <h1 class="mb-2">Lista de Proyectos</h1>
    <a href="{{ route('dashboard.proyectos.create') }}">
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
                    <th scope="col">Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectos as $proyecto)
                    <tr>
                        <td>{{ $proyecto->nombre }}</td>
                        <td>{{ date('d-m-Y',strtotime($proyecto->fecha)) }}</td>
                        <td>{{ $proyecto->descripcion }}</td>
                        <td style="width: 170px; text-align: center">
                            <a href="{{ route('dashboard.proyectos.edit',$proyecto->id) }}" title="Editar proyecto">
                                <button class="btn btn-info">
                                    <i class="far fa-edit"></i>
                                </button>
                            </a>
                            <a data-target="#modal-delete-{{$proyecto->id}}" data-toggle="modal" href="" class="btn btn-danger" title="Eliminar proyecto">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <a href="{{ route('dashboard.proyectos.show',$proyecto->id) }}" title="Lista de Entradas o Post">
                                <button class="btn btn-success">
                                    <i class="fas fa-list"></i>
                                </button>
                            </a>
                        </td>
                        @include('dashboard.proyectos.modal')
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop