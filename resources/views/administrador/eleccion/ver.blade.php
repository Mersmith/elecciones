<div>
    <h2>VER ROL</h2>
    <a href="{{ route('eleccion.vista.todas') }}">Regresar</a>
    <a href="{{ route('eleccion.vista.crear') }}">Crear</a>
    <a href="{{ route('eleccion.vista.editar', $eleccion->id) }}">Editar</a>

    <br>
    <p>Nombre: {{ $eleccion->nombre }} </p>

    <br>
    <form action="{{ route('eleccion.eliminar', $eleccion->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>
</div>
