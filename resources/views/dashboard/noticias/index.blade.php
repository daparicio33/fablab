@extends('adminlte::page')

@section('title', 'Noticias')

@section('content_header')
    <h1>Noticias</h1>
    <a href="{{ route('dashboard.noticias.create') }}">
        <button class="btn btn-success">
            <i class="fas fa-user-friends"></i> Nueva Noticia
        </button>
    </a>
    @include('layouts.info')
@stop
@section('content')
    <div class="table-responsive-sm">
        <table class="table">
            <thead>
                <tr>
                    <td>Titulo</td>
                    <td>Texto</td>
                    <td>Etiquetas</td>
                    <td>Usuario</td>
                    <td>Fecha</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($noticias as $noticia)
                <tr>
                    {{-- <td>
                        <img class="rounded mx-auto d-block" style="width: 70px" src="{{ Storage::url($user->foto) }}" alt="">
                    </td> --}}
                    <td>{{ $noticia->titulo }}</td>
                    <td>{{ $noticia->texto }}</td>
                    <td>
                        @foreach ($noticia->netiquetas as $netiqueta )
                            {{ $netiqueta->etiqueta->nombre }}
                        @endforeach
                    </td>
                    <td>
                        <img title="{{ $noticia->user->name }}" class="rounded mx-auto d-block" style="width: 70px" src="{{ Storage::url($noticia->user->foto) }}" alt="">
                    </td>
                    <td>{{ $noticia->fecha }}</td>
                    <td style="width: 120px">
                        {{-- <a data-target="#modal-multimedia-{{$noticia->id}}" data-toggle="modal" title="Multimedia" class="btn btn-success">
                            <i class="fas fa-images"></i>
                        </a> --}}
                        <a href="{{ route('dashboard.noticias.edit',$noticia->id) }}" title="Editar noticia" class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="" data-target="#modal-delete-{{$noticia->id}}" title="Eliminar noticia" data-toggle="modal" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @include('dashboard.noticias.modal')
                @endforeach
            </tbody>
        </table>
    </div>
@stop