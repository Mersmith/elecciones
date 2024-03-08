<div>
    <h2>TODAS USUARIOS</h2>
    <a href="{{ route('administracion.usuario.crear') }}">Crear</a>
    <br>
    @if (session('mensajeCrud'))
        <h6>{{ session('mensajeCrud') }}</h6>
    @endif
    <ul>
        @foreach ($usuarios as $item)
            <li>
                <span>{{ $item->name }}</span>
                <a href="{{ route('administracion.usuario.vista.ver', $item->id) }}">Ver</a>
                <a href="{{ route('administracion.usuario.vista.editar', $item->id) }}">Editar</a>
                <a href="{{ route('administracion.usuario.vista.asignar.rol', $item->id) }}">Rol</a>
            </li>
        @endforeach
    </ul>
</div>
