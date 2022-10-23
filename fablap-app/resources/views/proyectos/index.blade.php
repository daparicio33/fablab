@extends('layouts.base')
@section('cuerpo')


<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image: url('');">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Proyectos</h2>
          <p>nuestra lista de proyectos FAB LAB</p>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="{{ route('home') }}">Inicio</a></li>
        <li>Proyectos</li>
      </ol>
    </div>
  </nav>
</div><!-- End Breadcrumbs -->

<!-- ======= Blog Section ======= -->
<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">
    
    <div class="row gy-4 posts-list">
      @foreach ($proyectos as $proyecto)
      <div class="col-xl-4 col-md-6">
        <article>
          <div class="post-img">
            <img src="{{ Storage::url($proyecto->url) }}" alt="" class="img-fluid">
          </div>
          <p class="post-category">Politics</p>
          <h2 class="title">
            <a href="{{ route('home.proyectos.show', $proyecto->id) }}">{{ $proyecto->nombre }}</a>
          </h2>
          <div class="d-flex align-items-center">
            <img src="{{ Storage::url($proyecto->user->foto) }}" alt="" class="img-fluid post-author-img flex-shrink-0">
            <div class="post-meta">
              <p class="post-author-list">{{ $proyecto->user->name }}</p>
              <p class="post-date">
                <time datetime="2022-01-01">{{ date('d-M-Y',strtotime($proyecto->fecha)) }}</time>
              </p>
            </div>
          </div>
        </article>
      
    </div>
    @endforeach
    <!-- End post list item -->
    
  </div>
  <!-- End blog posts list -->
  <div class="blog-pagination">
      <ul class="justify-content-center">
        <li><a href="#">1</a></li>
        <li class="active"><a href="#">2</a></li>
        <li><a href="#">3</a></li>
      </ul>
  </div><!-- End blog pagination -->  
</section><!-- End Blog Section -->



@endsection