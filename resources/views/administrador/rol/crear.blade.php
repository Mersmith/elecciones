<div>
    <h2>CREAR ROL</h2>
    <a href="{{ route('rol.vista.todas') }}">Regresar</a>
    
    <form action="{{route('rol.crear')}}" method="POST">
        @csrf
        <p>Nombre:</p>
        <input type="text" name="nombre">
        <br>      

        <button type="submit">Enviar</button>
    </form>
</div>
