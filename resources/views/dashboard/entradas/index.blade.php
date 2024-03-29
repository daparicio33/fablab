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
                    <th>#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entradas as $entrada)
                    <tr>
                        <td class="font-weight-bold">{{ $loop->iteration }}</td>
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
                    {{-- lista de imagenes --}}
                    <tr>
                        <td colspan="4">
                            Imagenes
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div class="row">
                                @foreach ($entrada->medias as $media)
                                @if ($media->tipo == 'imagen')
                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="card">
                                        <img src="{{ Storage::url($media->url) }}" class="card-img-top" alt="imagen no disponible">
                                        <div class="card-body">
                                        <h6 class="card-title">{{ $media->tipo }}</h6>
                                        <p class="card-text">
                                            {{ $media->descripcion }}
                                        </p>
                                        <a href="" data-target="#mdelete-{{$media->id}}" data-toggle="modal" class="btn btn-danger" title="eliminar">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                                @include('dashboard.medias.mdelete')
                                @endif
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    {{-- fin de la lista de las imagenes --}}
                    {{-- inicio del video --}}
                    <tr>
                        <td colspan="4">
                            Videos
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div class="row">
                                @foreach ($entrada->medias as $media)
                                    @if ($media->tipo == 'video')
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="card">
                                            <div class="ratio ratio-16x9">
                                                <iframe src="{{ $media->url }}" title="YouTube video" style="width: 100%" allowfullscreen></iframe>
                                            </div>
                                            <div class="card-body">
                                            <h6 class="card-title">{{ $media->tipo }}</h6>
                                            <p class="card-text">
                                                {{ $media->descripcion }}
                                            </p>
                                            <a href="" data-target="#mdelete-{{$media->id}}" data-toggle="modal" class="btn btn-danger" title="eliminar">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                    @include('dashboard.medias.mdelete')
                                    @endif
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    {{-- fin del video --}}
                    {{-- inicio de la lista de archivos --}}
                    <tr>
                        <td colspan="4">
                            Archivos
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div class="row">
                                @foreach ($entrada->medias as $media)
                                @if ($media->tipo == 'archivo')
                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="card">
                                        <img src="{{ Storage::url('public/defaultFile.png') }}" class="card-img-top" alt="imagen no disponible">
                                        <div class="card-body">
                                        <h5 class="card-title">{{ $media->tipo }}</h5>
                                        <p class="card-text">
                                            {{ $media->descripcion }}
                                            <a href="{{ Storage::url($media->url) }}">descargar aca</a>
                                        </p>
                                        <a href="" data-target="#mdelete-{{$media->id}}" data-toggle="modal"  class="btn btn-danger" title="eliminar">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                                @include('dashboard.medias.mdelete')
                                @endif
                                @endforeach
                            </div>
                        </td>
                    </tr>
                    {{-- fin de la lista de archivos --}}
                @endforeach
            </tbody>
        </table>
    </div>
@stop