<section id="services" class="services sections-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Nuestros Servicios</h2>
        <p>máquinas y servicios que ofrecemos</p>
      </div>

      <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
        @foreach ($servicios as $servicio)
        <div class="col-lg-4 col-md-6">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="{{ $servicio->icon }}"></i>
              </div>
              <h3>{{ $servicio->nombre }}</h3>
              <img src="{{ Storage::url($servicio->url) }}" width="100%" alt="">
              <p>{{ Str::limit($servicio->descripcion, 50, '...')  }}</p>
              {{-- <a href="#" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a> --}}
            </div>
          </div><!-- End Service Item -->
        @endforeach
      </div>

    </div>
  </section><!-- End Our Services Section -->