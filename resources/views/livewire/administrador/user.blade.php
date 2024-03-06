<div>
    <p>Nombre:</p>
    <input type="text" wire:model="nombre" placeholder="Nombre" required>

    <p>Email:</p>
    <input type="email" wire:model="email" placeholder="Email" required>

    <p>Contraseña:</p>
    <input type="password" wire:model="password" placeholder="Contraseña" required>

    <p>Rol:</p>
    <ul>
        @foreach ($roles as $rol)
            <label for="">
                {{ $rol->nombre }}
                <input type="checkbox" name="roles[]" value="{{ $rol->id }}" wire:model="roles_elegidos">
            </label>
        @endforeach
    </ul>

    <br>
    <div>
        <button wire:click="enviar">Enviar</button>
    </div>
</div>
