@extends('layouts.base')
@section('cuerpo')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="page-header d-flex align-items-center" style="background-image: url('');">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8 text-center">
          <h2>{{ $proyecto->nombre }}</h2>
          <p>Por: {{ $proyecto->user->name }}</p>
        </div>
      </div>
    </div>
  </div>
  <nav>
    <div class="container">
      <ol>
        <li><a href="{{ route('home') }}">Inicio</a></li>
        <li>Proyecto</li>
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
            <img src="{{ Storage::url($proyecto->url) }}" alt="" class="img-fluid">
          </div>
          <h2 class="title">{{ $proyecto->nombre }}</h2>
          <div class="meta-top">
            <ul>
              <li class="d-flex align-items-center">
                <i class="bi bi-person"></i> 
                <a href="blog-details.html">{{ $proyecto->user->name }}</a>
              </li>
              <li class="d-flex align-items-center">
                <i class="bi bi-clock"></i> 
                <a href="blog-details.html">
                  <time datetime="2020-01-01">{{ date('d-M-Y',strtotime($proyecto->fecha)) }}</time>
                </a>
              </li>
              <li class="d-flex align-items-center">
                <i class="bi bi-chat-dots"></i> 
                <a href="blog-details.html">
                  12 Comments
                </a>
              </li>
            </ul>
          </div><!-- End meta top -->

          <div class="content">
            <p style="text-align: justify">
              {{ $proyecto->descripcion }}
            </p>
          </div>
        </article>
        <!-- End blog post -->
        <article class="blog-details">
          <h2 class="title">Entradas del Proyecto</h2>
          <div class="meta-top">
            <div class="accordion accordion-flush" id="accordionFlushExample">
              @foreach ($proyecto->entradas as $entrada)
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne{{ $entrada->id }}">
                    <button class="accordion-button collapsed" 
                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $entrada->id }}" 
                    aria-expanded="false" aria-controls="flush-collapse{{ $entrada->id }}">
                      {{ $entrada->titulo }}
                    </button>
                  </h2>
                  <div id="flush-collapse{{ $entrada->id }}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{ $entrada->id }}" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                    {{-- entradas de imagenes --}}
                      <div class="row">
                        <p>
                          {{ $entrada->descripcion }} <code><small>{{ date('d-M-Y',strtotime($entrada->fecha)) }}</small></code>
                        </p>
                        <label for="" class="mb-5">
                          <i class="bi bi-images"></i> Imagenes
                        </label>
                        @foreach ($entrada->medias as $media)
                          @if ($media->tipo == 'imagen')
                            <div class="col-sm-12 col-md-3 col-lg-3">
                              <figure class="figure">
                                <a data-zoomable="true" data-glightbox="description:{{ $media->descripcion }}" href="{{ Storage::url($media->url) }}" class="glightbox" data-gallery="gallery{{ $entrada->id }}">
                                  <img src="{{ Storage::url($media->url) }}" class="figure-img img-fluid rounded" alt="imagen no disponible">
                                </a>
                                <figcaption class="figure-caption">{{ $media->descripcion }}</figcaption>
                              </figure>
                            </div>
                          @endif
                        @endforeach
                        {{-- termina las imagenes --}}
                        <label for="">
                          <i class="bi bi-camera-reels"></i> Videos 
                        </label>
                        @foreach ($entrada->medias as $media)
                          @if ($media->tipo == 'video')
                          <div class="col-sm-12 col-md-12 col-lg-12">
                            <section id="call-to-action" class="call-to-action">
                              <div class="container text-center" data-aos="zoom-out">
                                <a href="{{ $media->url }}" class="glightbox play-btn"></a>
                                <p>{{ $media->descripcion }}</p>
                              </div>
                            </section>
                          </div>
                          @endif
                        @endforeach
                        {{-- termina los videos --}}
                        <label for="">
                          <i class="bi bi-archive"></i> Archivos 
                        </label>
                          <div class="col-sm-12 col-md-12 col-lg-12">
                                @foreach ($entrada->medias as $media)
                                  @if ($media->tipo == 'archivo')
                                  <div class="card mt-3">
                                  <div class="card-body">
                                    <small>{{ $media->descripcion }}</small>
                                  </div>
                                  <div class="card-footer text-muted">
                                    <a href="{{ Storage::url($media->url) }}">
                                      <small>
                                        <i class="bi bi-cloud-download"></i> descargar
                                      </small>
                                    </a>
                                  </div>
                                  </div>
                                  @endif
                                @endforeach
                          </div>
                        {{-- fin de archivos --}}
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </article>
      {{-- <div class="post-author d-flex align-items-center">
          <img src="assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="">
          <div>
            <h4>Jane Smith</h4>
            <div class="social-links">
              <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
              <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
              <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
            </div>
            <p>
              Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
            </p>
          </div>
        </div> --}}
        <!-- End post author -->

        {{-- <div class="comments">
          <h4 class="comments-count">8 Comments</h4>

          <div id="comment-1" class="comment">
            <div class="d-flex">
              <div class="comment-img"><img src="assets/img/blog/comments-1.jpg" alt=""></div>
              <div>
                <h5><a href="">Georgia Reader</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan,2022</time>
                <p>
                  Et rerum totam nisi. Molestiae vel quam dolorum vel voluptatem et et. Est ad aut sapiente quis molestiae est qui cum soluta.
                  Vero aut rerum vel. Rerum quos laboriosam placeat ex qui. Sint qui facilis et.
                </p>
              </div>
            </div>
          </div><!-- End comment #1 -->

          <div id="comment-2" class="comment">
            <div class="d-flex">
              <div class="comment-img"><img src="assets/img/blog/comments-2.jpg" alt=""></div>
              <div>
                <h5><a href="">Aron Alvarado</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan,2022</time>
                <p>
                  Ipsam tempora sequi voluptatem quis sapiente non. Autem itaque eveniet saepe. Officiis illo ut beatae.
                </p>
              </div>
            </div>

            <div id="comment-reply-1" class="comment comment-reply">
              <div class="d-flex">
                <div class="comment-img"><img src="assets/img/blog/comments-3.jpg" alt=""></div>
                <div>
                  <h5><a href="">Lynda Small</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                  <time datetime="2020-01-01">01 Jan,2022</time>
                  <p>
                    Enim ipsa eum fugiat fuga repellat. Commodi quo quo dicta. Est ullam aspernatur ut vitae quia mollitia id non. Qui ad quas nostrum rerum sed necessitatibus aut est. Eum officiis sed repellat maxime vero nisi natus. Amet nesciunt nesciunt qui illum omnis est et dolor recusandae.

                    Recusandae sit ad aut impedit et. Ipsa labore dolor impedit et natus in porro aut. Magnam qui cum. Illo similique occaecati nihil modi eligendi. Pariatur distinctio labore omnis incidunt et illum. Expedita et dignissimos distinctio laborum minima fugiat.

                    Libero corporis qui. Nam illo odio beatae enim ducimus. Harum reiciendis error dolorum non autem quisquam vero rerum neque.
                  </p>
                </div>
              </div>

              <div id="comment-reply-2" class="comment comment-reply">
                <div class="d-flex">
                  <div class="comment-img"><img src="assets/img/blog/comments-4.jpg" alt=""></div>
                  <div>
                    <h5><a href="">Sianna Ramsay</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                    <time datetime="2020-01-01">01 Jan,2022</time>
                    <p>
                      Et dignissimos impedit nulla et quo distinctio ex nemo. Omnis quia dolores cupiditate et. Ut unde qui eligendi sapiente omnis ullam. Placeat porro est commodi est officiis voluptas repellat quisquam possimus. Perferendis id consectetur necessitatibus.
                    </p>
                  </div>
                </div>

              </div><!-- End comment reply #2-->

            </div><!-- End comment reply #1-->

          </div><!-- End comment #2-->

          <div id="comment-3" class="comment">
            <div class="d-flex">
              <div class="comment-img"><img src="assets/img/blog/comments-5.jpg" alt=""></div>
              <div>
                <h5><a href="">Nolan Davidson</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan,2022</time>
                <p>
                  Distinctio nesciunt rerum reprehenderit sed. Iste omnis eius repellendus quia nihil ut accusantium tempore. Nesciunt expedita id dolor exercitationem aspernatur aut quam ut. Voluptatem est accusamus iste at.
                  Non aut et et esse qui sit modi neque. Exercitationem et eos aspernatur. Ea est consequuntur officia beatae ea aut eos soluta. Non qui dolorum voluptatibus et optio veniam. Quam officia sit nostrum dolorem.
                </p>
              </div>
            </div>

          </div><!-- End comment #3 -->
          <div id="comment-4" class="comment">
            <div class="d-flex">
              <div class="comment-img"><img src="assets/img/blog/comments-6.jpg" alt=""></div>
              <div>
                <h5><a href="">Kay Duggan</a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                <time datetime="2020-01-01">01 Jan,2022</time>
                <p>
                  Dolorem atque aut. Omnis doloremque blanditiis quia eum porro quis ut velit tempore. Cumque sed quia ut maxime. Est ad aut cum. Ut exercitationem non in fugiat.
                </p>
              </div>
            </div>
          </div><!-- End comment #4 -->

          <div class="reply-form">
            <h4>Leave a Reply</h4>
            <p>Your email address will not be published. Required fields are marked * </p>
            <form action="">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input name="name" type="text" class="form-control" placeholder="Your Name*">
                </div>
                <div class="col-md-6 form-group">
                  <input name="email" type="text" class="form-control" placeholder="Your Email*">
                </div>
              </div>
              <div class="row">
                <div class="col form-group">
                  <input name="website" type="text" class="form-control" placeholder="Your Website">
                </div>
              </div>
              <div class="row">
                <div class="col form-group">
                  <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Post Comment</button>
            </form>
          </div>
        </div><!-- End blog comments --> --}}

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

          {{-- <div class="sidebar-item categories">
            <h3 class="sidebar-title">Categories</h3>
            <ul class="mt-3">
              <li><a href="#">General <span>(25)</span></a></li>
              <li><a href="#">Lifestyle <span>(12)</span></a></li>
              <li><a href="#">Travel <span>(5)</span></a></li>
              <li><a href="#">Design <span>(22)</span></a></li>
              <li><a href="#">Creative <span>(8)</span></a></li>
              <li><a href="#">Educaion <span>(14)</span></a></li>
            </ul>
          </div><!-- End sidebar categories--> --}}

          <div class="sidebar-item recent-posts">
            <h3 class="sidebar-title">Entradas del Proyecto</h3>

            <div class="mt-3">
              @foreach ($proyecto->entradas as $entrada)
                <div class="post-item" style="overflow: auto" >
                  <img src="{{ Storage::url('public/defaultLogo.png') }}" alt="">
                  <div>
                    <h4><a href="blog-details.html">{{ $entrada->titulo }}</a></h4>
                    <time datetime="2020-01-01">{{ date('d-M-Y',strtotime($entrada->fecha)) }}</time>
                  </div>
                </div>
              <!-- End recent post item-->
              @endforeach
            </div>

          </div><!-- End sidebar recent posts-->

          {{-- <div class="sidebar-item tags">
            <h3 class="sidebar-title">Tags</h3>
            <ul class="mt-3">
              <li><a href="#">App</a></li>
              <li><a href="#">IT</a></li>
              <li><a href="#">Business</a></li>
              <li><a href="#">Mac</a></li>
              <li><a href="#">Design</a></li>
              <li><a href="#">Office</a></li>
              <li><a href="#">Creative</a></li>
              <li><a href="#">Studio</a></li>
              <li><a href="#">Smart</a></li>
              <li><a href="#">Tips</a></li>
              <li><a href="#">Marketing</a></li>
            </ul>
          </div><!-- End sidebar tags--> --}}

        </div><!-- End Blog Sidebar -->

      </div>
    </div>

  </div>
</section><!-- End Blog Details Section -->


@endsection