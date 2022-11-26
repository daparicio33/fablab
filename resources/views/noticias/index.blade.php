@extends('layouts.base')
@section('cuerpo')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image: url('');">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>
            Noticias
            {{-- @if (isset($categoria)) - {{ $categoria }} @endif --}}
          </h2>
          <p>enterate de las ultimas noticias y eventos.</p>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="{{ route('home') }}">Inicio</a></li>
        <li>
          Noticias - Eventos
        </li>
      </ol>
    </div>
  </nav>
</div><!-- End Breadcrumbs -->

<section id="portfolio" class="portfolio sections-bg">
    <div class="container" data-aos="fade-up">
      <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos="fade-up" data-aos-delay="100">
        <div>
          <ul class="portfolio-flters">
            <li data-filter="*" class="filter-active">Todos</li>
            @foreach ($etiquetas as $etiqueta)
                <li data-filter=".filter-{{ $etiqueta->nombre }}">{{ $etiqueta->nombre }}</li>    
            @endforeach
            {{-- <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-product">Product</li>
            <li data-filter=".filter-branding">Branding</li>
            <li data-filter=".filter-books">Books</li> --}}
          </ul><!-- End Portfolio Filters -->
        </div>

        <div class="row gy-4 portfolio-container">
            @foreach ($noticias as $noticia)
                <div class="col-xl-4 col-md-6 portfolio-item @foreach ($noticia->netiquetas as $netiqueta ) filter-{{ $netiqueta->etiqueta->nombre }}@endforeach">
                    <div class="portfolio-wrap">
                    <a href="{{ Storage::url($noticia->imagenes[0]->url) }}" data-gallery="portfolio-gallery-app" class="glightbox"><img src="{{ Storage::url($noticia->imagenes[0]->url) }}" class="img-fluid" alt=""></a>
                    <div class="portfolio-info">
                        <h4><a href="portfolio-details.html" title="More Details">{{ $noticia->titulo }}</a></h4>
                        <p>{{ Str::limit($noticia->texto, 50, '...')  }}</p>
                        <a href="{{ route('home.noticias.show',$noticia->id) }}">leer mas</a>
                    </div>
                    
                    </div>
                </div><!-- End Portfolio Item -->
            @endforeach
        </div><!-- End Portfolio Container -->
      </div>
    </div>
  </section><!-- End Portfolio Section -->
@endsection