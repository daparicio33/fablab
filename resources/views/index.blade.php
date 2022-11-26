@extends('layouts.base')
@section('titulo','FabLAB IDEX - PJ')
@section('slider')
  @include('layouts.slider')
@endsection
@section('cuerpo')
<!-- ======= Recent Blog Posts Section ======= -->
@include('layouts.proyectos')
@include('layouts.noticias')
@include('layouts.servicios')
@endsection
