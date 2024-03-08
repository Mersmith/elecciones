<div>
    <h2>CREAR ELECCION</h2>
    <a href="{{ route('administracion.eleccion.vista.todas') }}">Regresar</a>

    <form action="{{ route('administracion.eleccion.crear') }}" method="POST">
        @csrf
        <p>Nombre:</p>
        <input type="text" name="nombre">
        <br>

        <p>Fecha de Inicio:</p>
        <input type="datetime-local" name="fecha_inicio" required>
        <br>

        <p>Fecha de Fin:</p>
        <input type="datetime-local" name="fecha_fin" required>
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
