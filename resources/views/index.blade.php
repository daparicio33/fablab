@extends('layouts.base')
@section('titulo','FabLAB IDEX - PJ')
@section('slider')
  @include('layouts.slider')
@endsection
@section('cuerpo')
<!-- ======= Recent Blog Posts Section ======= -->
<section id="recent-posts" class="recent-posts sections-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-header">
      <h2>Proyectos Fab IDEX Perú Japón</h2>
      <p>da un vistazo a nuestos proyectos mas recientes ...</p>
    </div>

    <div class="row gy-4">
      
      @foreach ($proyectos as $proyecto)
        <!-- Start post list item -->
        <div class="col-xl-4 col-md-6">
          <article>
            <div class="post-img">            
              <img src="{{ Storage::url($proyecto->url) }}" alt="" class="img-fluid">
            </div>
            <p class="post-category">{{ end($proyecto->entradas)  }}</p>
            <h2 class="title">
              <a href="{{ route('home.proyectos.show',$proyecto->id) }}">{{ $proyecto->nombre }}</a>
            </h2>
            <div class="d-flex align-items-center">
              <img src="{{ Storage::url($proyecto->user->foto) }}" alt="" class="img-fluid post-author-img flex-shrink-0">
              <div class="post-meta">
                <p class="post-author">{{ $proyecto->user->name }}</p>
                <p class="post-date">
                  <time>{{ date('d-M-Y',strtotime($proyecto->fecha)) }}</time>
                </p>
                <p>
                  <small class="text-danger">
                    {{ $proyecto->tproyecto->nombre }}
                  </small>
                </p>
              </div>
            </div>
          </article>
        </div>
        <!-- End post list item -->
      @endforeach
    </div>
    <!-- End recent posts list -->
  </div>
</section>
<!-- End Recent Blog Posts Section -->



@endsection
