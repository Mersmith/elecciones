<div>
    <h2>EDITAR USUARIO</h2>
    <a href="{{ route('usuario.vista.todas') }}">Regresar</a>
    <a href="{{ route('usuario.vista.crear') }}">Crear</a>
    <a href="{{ route('usuario.vista.editar', $usuario->id) }}">Editar</a>
    <br>
    <form action="{{ route('usuario.editar', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>Nombre:</p>
        <input type="text" name="nombre" value="{{ $usuario->nombre }}">
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
