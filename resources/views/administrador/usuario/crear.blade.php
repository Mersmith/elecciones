<div>
    <h2>CREAR USUARIO</h2>
    <a href="{{ route('administracion.usuario.vista.todas') }}">Regresar</a>

    <form action="{{ route('administracion.usuario.crear') }}" method="POST">
        @csrf
        <p>Nombre:</p>
        <input type="text" name="name" placeholder="Nombre" required>
        @error('name')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <p>Email:</p>
        <input type="email" name="email" placeholder="Email" required>
        @error('email')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <p>Contraseña:</p>
        <input type="password" name="password" placeholder="Contraseña" required>
        @error('password')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
