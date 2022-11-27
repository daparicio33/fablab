<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center" style="justify-content: right">
      {{-- <a href="{{ route('home') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/logofablabnew.png') }}" alt="">
      </a> --}}
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{ route('home') }}">Inicio</a></li>
          <li><a href="{{ route('home.nosotros') }}">Nosotros</a></li>
          <li class="dropdown">
            <a href="{{ route('home.proyectos') }}"><span>Proyectos</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              @foreach ($tproyectos as $tproyecto)
                  <li><a href="{{ route('home.proyectoxcategoria',$tproyecto->id) }}">{{ $tproyecto->nombre }}</a></li>    
              @endforeach
          </ul>
          </li>
          <li><a href="{{ route('home.noticias') }}">Noticias</a></li>
          <li><a href="#services">Servicios</a></li>
        {{-- 
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#team">Team</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
            </li>
        --}}
          <li><a href="{{ route('home.contacto') }}">Contacto</a></li>
          <li>
            <a href="{{ route('dashboard.index') }}" class="btn btn-primary" style="padding: 7px 10px">
              <i class="bi bi-box-arrow-right fs-5"> </i> &nbsp Ingresar 
            </a>
          </li>
        </ul>
      </nav><!-- .navbar -->
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header>