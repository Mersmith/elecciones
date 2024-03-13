<div>
    <h2>CREAR ROL</h2>
    <a href="{{ route('administracion.rol.vista.todas') }}">Regresar</a>
    
    <form action="{{route('administracion.rol.crear')}}" method="POST">
        @csrf
        <p>Nombre:</p>
        <input type="text" name="nombre">
        <br>      

        <button type="submit">Enviar</button>
    </form>
</div>
