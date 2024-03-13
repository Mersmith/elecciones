<div>
    <h2>VER USUARIO ROL</h2>
    <a href="{{ route('administracion.usuario.vista.todas') }}">Regresar</a>
    <a href="{{ route('administracion.usuario.vista.crear') }}">Crear</a>
    <a href="{{ route('administracion.usuario.vista.editar', $usuario->id) }}">Editar</a>

    <br>
    <p>Nombre: {{ $usuario->name }} </p>

    <form action="{{ route('administracion.usuario.asignar.rol', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h3>Roles:</h3>
        <ul>
            @foreach ($roles as $rol)
                <label for="">
                    {{ $rol->nombre }}
                    <input type="checkbox" name="roles[]" value="{{ $rol->id }}"
                        {{ $usuario->roles->contains($rol->id) ? 'checked' : '' }}>
                </label>
            @endforeach
        </ul>

        <button type="submit">Enviar</button>
    </form>
</div>
