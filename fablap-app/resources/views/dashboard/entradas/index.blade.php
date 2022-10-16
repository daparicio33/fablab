@extends('adminlte::page')
@section('title', 'Dashboard | Entradas')
@section('content_header')
    <h1 class="mb-2">Lista de Entradas del Proyecto</h1>
    <h6 class='h6 mb-3 text-danger'>{{ $proyecto->nombre }}</h5>
    {{-- formulario para mandar el id del proyecto --}}
    <form action="{{ asset('dashboard/entradas/create') }}" method="get">
        {!! Form::hidden('proyecto_id', $proyecto->id, [null]) !!}
        <button class="btn btn-success">
            <i class="fas fa-list-ol"></i>
            Nueva Entrada
        </button>
    </form>
    {{-- fin del formulario --}}
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
                    <th scope="col">Titulo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entradas as $entrada)
                    <tr>
                        <td>{{ $entrada->titulo }}</td>
                        <td>{{ date('d-m-Y',strtotime($proyecto->fecha)) }}</td>
                        <td>{{ $entrada->descripcion }}</td>
                        <td style="width: 170px; text-align: center">
                            <a href="{{ route('dashboard.entradas.edit',$entrada->id) }}" title="Editar proyecto">
                                <button class="btn btn-info">
                                    <i class="far fa-edit"></i>
                                </button>
                            </a>
                            <a href="" data-target="#modal-delete-{{$entrada->id}}" data-toggle="modal"  class="btn btn-danger" title="Eliminar proyecto">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <a href="" data-target="#multimedia-{{$entrada->id}}" data-toggle="modal" title="Agregar multimedia">
                                <button class="btn btn-success">
                                    <i class="fas fa-images"></i>
                                </button>
                            </a>
                        </td>
                        @include('dashboard.entradas.multimedia')
                        @include('dashboard.entradas.modal')
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop