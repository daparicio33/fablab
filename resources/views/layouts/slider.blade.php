<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">
    <div class="container position-relative">
      {{-- <div class="row" style="margin-bottom: 6rem">
        <div class="col-lg-6 d-flex justify-content-start">
          <a href="{{ route('home') }}" class="logo d-flex">
            <img height="80px" src="{{ asset('assets/img/logofablabnew.png') }}" alt="">
          </a>
        </div>
        <div class="col-lg-6 d-flex justify-content-end">
            <img height="80px" src="{{ asset('assets/img/logoIDEX.png') }}" alt="">
        </div>
      </div> --}}
      <div class="row">
        <div class="col-sm-12 d-clear">
          <a href="{{ route('home') }}">
            <img height="70px" src="{{ asset('assets/img/logofablabnew.png') }}" alt="">
          </a>
          <a href="http://idexperujapon.edu.pe"  style="float: right;">
            <img height="120px" src="{{ asset('assets/img/logoIDEX.png') }}" alt="">
          </a>
        </div>
      </div>
      <div class="row gy-5 mt-5" data-aos="fade-in">
        <div class="col-lg-12 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-center">
          <h2><span>Bienvenido Laboratorio de Fabricación Digital</span></h2>
          {{-- <p>Ven y forma parte de esta nueva forma de hacer tus ideas, en nuestro laboratorio podras dar rienda suelta a tu creatividad, aca todo es posible.</p> --}}
          <div class="d-flex justify-content-center justify-content-lg-center">
            <a href="#about" class="btn-get-started">Informate</a>
            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Ver Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          {{-- <img src="assets/img/hero-img.svg" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100"> --}}
        </div>
      </div>
    </div>

    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-building"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Construye y crea</a></h4>
            </div>
          </div>
          <!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-people"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Comparte conocimiento</a></h4>
            </div>
          </div>
          <!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-lightbulb"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Desarrolla tu ideas</a></h4>
            </div>
          </div>
          <!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-boxes"></i></div>
              <h4 class="title"><a href="" class="stretched-link">Laboratorio digital</a></h4>
            </div>
          </div>
          <!--End Icon Box -->

        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->