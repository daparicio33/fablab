<div class="sidebar-item categories">
    <h3 class="sidebar-title">Categorias</h3>
    <ul class="mt-3">
        @foreach ($tproyectos as $tproyecto)
            <li><a href="#">{{ $tproyecto->nombre }} <span>({{ count($tproyecto->proyectos) }})</span></a></li>      
        @endforeach
    </ul>
</div><!-- End sidebar categories-->