<div>
    <h2>TODAS ROLES</h2>
    <a href="{{ route('rol.vista.crear') }}">Crear</a>
    <br>
    @if (session('mensajeCrud'))
        <h6>{{ session('mensajeCrud') }}</h6>
    @endif
    <ul>
        @foreach ($roles as $item)
            <li>
                <span>{{ $item->nombre }}</span>
                <a href="{{ route('rol.vista.ver', $item->id) }}">Ver</a>
                <a href="{{ route('rol.vista.editar', $item->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
</div>
