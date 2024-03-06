<div>
    <h2>VER USUARIO</h2>
    <a href="{{ route('usuario.vista.todas') }}">Regresar</a>
    <a href="{{ route('usuario.vista.crear') }}">Crear</a>
    <a href="{{ route('usuario.vista.editar', $usuario->id) }}">Editar</a>

    <br>
    <p>Nombre: {{ $usuario->name }} </p>

    <br>
    <form action="{{ route('usuario.eliminar', $usuario->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</div>
