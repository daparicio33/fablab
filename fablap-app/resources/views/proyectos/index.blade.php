@extends('layouts.base')
@section('cuerpo')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('');">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>{{ $proyecto->nombre }}</h2>
            <p>Autor: {{ $proyecto->user->name }}</p>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="{{ route('home') }}">Inicio</a></li>
          <li>Detalles del Proyecto</li>
        </ol>
      </div>
    </nav>
  </div>
  <!-- End Breadcrumbs -->

  <!-- ======= Blog Details Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
      <div class="row g-5">
        <div class="col-lg-8">
          <article class="blog-details">
            <div class="post-img">
              <img src="{{ Storage::url('public/defaultLogo.png') }}" alt="" class="img-fluid">
            </div>
            <h2 class="title">{{ $proyecto->nombre }}</h2>

            <div class="meta-top">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">{{ $proyecto->user->name }}</a></li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">{{ date('d-M-Y',strtotime($proyecto->fecha)) }}</time></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li>
              </ul>
            </div><!-- End meta top -->

            <div class="content">
              <p>
                {{ $proyecto->descripcion }}
              </p>
              <blockquote>
                <p>
                  Detalles del Proyecto
                </p>
              </blockquote>
              @foreach ($proyecto->entradas as $entrada)
                <h3>{{ $entrada->titulo }}</h3>
                <p>{{ $entrada->descripcion }}</p>
                {{-- vamos a mostrar los contenidos multimedia del proyecto --}}
                <section id="portfolio" class="portfolio sections-bg">
                    <div class="container aos-init aos-animate" data-aos="fade-up">
                      <div class="section-header">
                        <h2>Multimedia del la Entrada</h2>
                        <p>para esta entrada presentamos estos archivos multimedia</p>
                      </div>             
                    </div>
                  </section>

              @endforeach
              <img src="assets/img/blog/blog-inside-post.jpg" class="img-fluid" alt="">
          </article>
          <!-- End blog post -->
        </div>
        <div class="col-lg-4">
          <div class="sidebar">
            <div class="sidebar-item search-form">
              <h3 class="sidebar-title">Buscar</h3>
              <form action="" class="mt-3">
                <input type="text">
                <button type="submit"><i class="bi bi-search"></i></button>
              </form>
            </div><!-- End sidebar search formn-->
            <div class="sidebar-item recent-posts">
              <h3 class="sidebar-title">Entradas del Proyecto</h3>
              <div class="mt-3">
                @foreach ($proyecto->entradas as $entrada)
                    <div class="post-item mt-3">
                        <img src="{{ Storage::url('public/defaultLogo.png') }}" alt="">
                        <div>
                        <h4>
                            <a href="blog-details.html">
                                {{ $entrada->titulo }}
                            </a>
                        </h4>
                        <time datetime="2020-01-01">{{ date('d-M-Y',strtotime($entrada->fecha)) }}</time>
                        </div>
                    </div>
                @endforeach
              </div>

            </div>
            <!-- End sidebar recent posts-->
          </div>
          <!-- End Blog Sidebar -->
        </div>
      </div>
    </div>
  </section>
  <!-- End Blog Details Section -->
@endsection