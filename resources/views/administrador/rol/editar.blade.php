<div>
    <h2>EDITAR MARCA</h2>
    <a href="{{ route('rol.vista.todas') }}">Regresar</a>
    <a href="{{ route('rol.vista.crear') }}">Crear</a>
    <a href="{{ route('rol.vista.editar', $rol->id) }}">Editar</a>
    <br>
    <form action="{{ route('rol.editar', $rol->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>Nombre:</p>
        <input type="text" name="nombre" value="{{ $rol->nombre }}">
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
