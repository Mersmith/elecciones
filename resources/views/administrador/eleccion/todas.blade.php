<div>
    <h2>TODAS ELECCIONES</h2>
    <a href="{{ route('eleccion.vista.crear') }}">Crear</a>
    <br>
    @if (session('mensajeCrud'))
        <h6>{{ session('mensajeCrud') }}</h6>
    @endif
    <ul>
        @foreach ($elecciones as $item)
            <li>
                <span>{{ $item->nombre }}</span>
                <a href="{{ route('eleccion.vista.ver', $item->id) }}">Ver</a>
                <a href="{{ route('eleccion.vista.editar', $item->id) }}">Editar</a>
                <a href="{{ route('administrador.eleccion.asignar.candidato', $item->id) }}">Candidato</a>
                <a href="{{ route('administrador.eleccion.votacion.votar', $item->id) }}">Votar</a>
            </li>
        @endforeach
    </ul>
</div>
