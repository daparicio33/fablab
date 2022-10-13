@extends('adminlte::page')

@section('title', 'Dashboard Administrador')

@section('content_header')
    <h1>Dashboard Administración</h1>
@stop

@section('content')
    <p>Bienvenido al panel: mostraremos estadisticas de la página</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop