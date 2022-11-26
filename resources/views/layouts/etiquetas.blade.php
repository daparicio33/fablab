<div class="sidebar-item categories">
    <h3 class="sidebar-title">Etiquetas</h3>
    <ul class="mt-3">
        @foreach ($etiquetas as $etiqueta)
            <li><a href="{{ route('home.noticias') }}">{{ $etiqueta->nombre }} <span>({{ count($etiqueta->netiquetas) }})</span></a></li>      
        @endforeach
    </ul>
</div>