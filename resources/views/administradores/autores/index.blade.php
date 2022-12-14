@extends('adminlte::page')

@section('title', 'Administrador -> Autores')

@section('content_header')
    <h1 class="mb-2">Lista de Autores del Sistema</h1>
    <a href="{{ route('administradores.autores.create') }}">
        <button class="btn btn-success">
            <i class="fas fa-user"></i>
            Nuevo Autor
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
                    <th scope="col">Email</th>
                    <th scope="col">Proyecto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($autores as $autore)
                    <tr>
                        <td>{{ $autore->user->name }}</td>
                        <td>{{ $autore->user->email }}</td>
                        <td>{{ $autore->proyecto->nombre }}</td>
                        <td style="width: 170px; text-align: center">
                            <a href="{{ route('administradores.autores.edit',$autore->id) }}">
                                <button class="btn btn-info">
                                    <i class="far fa-edit"></i> Editar
                                </button>
                            </a>
                            <a data-target="#modal-delete-{{$autore->id}}" data-toggle="modal" href="" class="btn btn-danger" title="eliminar matricula">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                        {{-- @include('administradores.proyectos.modal') --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop