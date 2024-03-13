<div>
    <h2>TODAS ELECCIONES</h2>
    <a href="{{ route('administracion.eleccion.vista.crear') }}">Crear</a>
    <br>
    @if (session('mensajeCrud'))
        <h6>{{ session('mensajeCrud') }}</h6>
    @endif
    <ul>
        @foreach ($elecciones as $item)
            <li>
                <span>{{ $item->nombre }}</span>
                <a href="{{ route('administracion.eleccion.vista.ver', $item->id) }}">Ver</a>
                <a href="{{ route('administracion.eleccion.vista.editar', $item->id) }}">Editar</a>
                <a href="{{ route('administracion.eleccion.asignar.candidato', $item->id) }}">Candidato</a>
                <a href="{{ route('eleccion.votacion.votar', $item->id) }}">Votar</a>
                <a href="{{ route('administracion.eleccion.votacion.resultados', $item->id) }}">Resultados</a>
            </li>
        @endforeach
    </ul>
</div>
