<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Noticias</h2>
        <p>mira nuestras ultimas noticias y eventos...</p>
      </div>
      <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
          @foreach ( $noticias as $noticia)
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <div class="d-flex align-items-center">
                    <div>
                      <h3>{{ $noticia->titulo }}</h3>
                      <h4>
                        @foreach ($noticia->netiquetas as $netiqueta)
                            {{ $netiqueta->etiqueta->nombre }}
                        @endforeach
                      </h4>
                      <div class="stars">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                      </div>
                      <img src="{{ Storage::url($noticia->imagenes[0]->url) }}" class="testimonial-img flex-shrink-0" alt="">
                    </div>
                  </div>
                  <p>
                    {{ Str::limit($noticia->texto, 100, '...') }}
                  </p>
                  <a href="{{ route('home.noticias.show',$noticia->id) }}">Leer mas..</a>
                </div>
              </div>
            </div>
            <!-- End testimonial item -->
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section>