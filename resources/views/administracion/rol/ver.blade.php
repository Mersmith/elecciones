<div>
    <h2>VER ROL</h2>
    <a href="{{ route('administracion.rol.vista.todas') }}">Regresar</a>
    <a href="{{ route('administracion.rol.vista.crear') }}">Crear</a>
    <a href="{{ route('administracion.rol.vista.editar', $rol->id) }}">Editar</a>

    <br>
    <p>Nombre: {{ $rol->nombre }} </p>

    <br>
    <form action="{{ route('administracion.rol.eliminar', $rol->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</div>
