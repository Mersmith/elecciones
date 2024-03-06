<div>
    <h2>EDITAR MARCA</h2>
    <a href="{{ route('eleccion.vista.todas') }}">Regresar</a>
    <a href="{{ route('eleccion.vista.crear') }}">Crear</a>
    <a href="{{ route('eleccion.vista.editar', $eleccion->id) }}">Editar</a>
    <br>
    <form action="{{ route('eleccion.editar', $eleccion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>Nombre:</p>
        <input type="text" name="nombre" value="{{ $eleccion->nombre }}">
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
