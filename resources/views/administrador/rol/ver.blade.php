<div>
    <h2>VER ROL</h2>
    <a href="{{ route('rol.vista.todas') }}">Regresar</a>
    <a href="{{ route('rol.vista.crear') }}">Crear</a>
    <a href="{{ route('rol.vista.editar', $rol->id) }}">Editar</a>

    <br>
    <p>Nombre: {{ $rol->nombre }} </p>

    <br>
    <form action="{{ route('rol.eliminar', $rol->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</div>
