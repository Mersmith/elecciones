<div>
    <h2>EDITAR MARCA</h2>
    <a href="{{ route('administracion.eleccion.vista.todas') }}">Regresar</a>
    <a href="{{ route('administracion.eleccion.vista.crear') }}">Crear</a>
    <a href="{{ route('administracion.eleccion.vista.editar', $eleccion->id) }}">Editar</a>
    <br>
    <form action="{{ route('administracion.eleccion.editar', $eleccion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>Nombre:</p>
        <input type="text" name="nombre" value="{{ $eleccion->nombre }}">
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
