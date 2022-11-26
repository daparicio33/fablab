@extends('layouts.base')
@section('cuerpo')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image: url('');">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8 text-center">
          <h2>{{ $noticia->titulo }}</h2>
          {{-- <p>Por: {{ $noticia->user->name }}</p> --}}
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="{{ route('home') }}">Inicio</a></li>
        <li>Noticias - Eventos</li>
      </ol>
    </div>
  </nav>
</div><!-- End Breadcrumbs -->

<!-- ======= Blog Details Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">
    <div class="row g-5">
      <div class="col-lg-8">
        <article class="blog-details">
          <div class="post-img">
            <img src="{{ Storage::url($noticia->imagenes[0]->url) }}" alt="" class="img-fluid">
          </div>
          <h2 class="title">{{ $noticia->titulo }}</h2>
          <div class="meta-top">
            <ul>
              <li class="d-flex align-items-center">
                <i class="bi bi-person"></i> 
                <a href="#">{{ $noticia->user->name }}</a>
              </li>
              <li class="d-flex align-items-center">
                <i class="bi bi-clock"></i> 
                <a href="#">
                  <time datetime="2020-01-01">{{ date('d-M-Y',strtotime($noticia->fecha)) }}</time>
                </a>
              </li>
              <li class="d-flex align-items-center">
                <i class="bi bi-chat-dots"></i> 
                <a href="#">
                  @foreach ($noticia->netiquetas as $netiquetas)
                      {{ $netiquetas->etiqueta->nombre }}
                  @endforeach
                </a>
              </li>
            </ul>
          </div><!-- End meta top -->

          <div class="content">
            <p style="text-align: justify">
              {{ $noticia->texto }}
            </p>
          </div>
        </article>
        <!-- End blog post -->
      </div>

      <div class="col-lg-4">
        <div class="sidebar">
          @include('layouts.search')
          <!-- End sidebar search formn-->
          @include('layouts.categorias')     
          @include('layouts.etiquetas')     
          {{-- categorias --}}
        </div>
        </div><!-- End Blog Sidebar -->
      </div>
    </div>
  </div>
</section><!-- End Blog Details Section -->


@endsection