@extends('layouts.base')
@section('titulo','Inicio ..')
@section('slider')
<!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Bienvenido <span>Laboratorio de Fabricación Digital</span></h2>
          <p>Ven y forma parte de esta nueva forma de hacer tus ideas, en nuestro laboratorio podras dar rienda suelta a tu creatividad, aca todo es posible.</p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started">Informate</a>
            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Ver Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="assets/img/hero-img.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-easel"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Lorem Ipsum</a></h4>
            </div>
          </div>
          <!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-gem"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Sed ut perspiciatis</a></h4>
            </div>
          </div>
          <!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-geo-alt"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Magni Dolores</a></h4>
            </div>
          </div>
          <!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-command"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Nemo Enim</a></h4>
            </div>
          </div>
          <!--End Icon Box -->

        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->
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
