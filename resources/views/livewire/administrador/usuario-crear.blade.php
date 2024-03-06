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
                <input type="checkbox" name="roles[]" value="{{ $rol->id }}" wire:model.live="roles_elegidos">
            </label>
        @endforeach
    </ul>

    @if (in_array(2, $roles_elegidos))
        <p>Apellido Paterno:</p>
        <input type="text" wire:model="apellido_paterno" required>

        <p>Apellido Materno:</p>
        <input type="text" wire:model="apellido_materno" required>

        <p>Código socio:</p>
        <input type="text" wire:model="codigo" required>

        <p>Celular:</p>
        <input type="text" wire:model="celular" required>

        <p>DNI:</p>
        <input type="text" wire:model="dni" required>
        
        <p>Sexo:</p>
        <label>
            <input type="radio" wire:model="sexo" value="H">
            Hombre
        </label>
        <label>
            <input type="radio" wire:model="sexo" value="M">
            Mujer
        </label>

        <p>Fecha nacimiento:</p>
        <input type="date" wire:model="fecha_nacimiento" required>

        <p>Condición:</p>
        <select wire:model="condicion">
            <option value="" disabled>Seleccione</option>
            <option value="INHABILITADO">INHABILITADO</option>
            <option value="HABILITADO">HABILITADO</option>
        </select>

        <p>Grado:</p>
        <select wire:model="grado">
            <option value="" disabled>Seleccione</option>
            <option value="PRIMARIA">PRIMARIA</option>
            <option value="SECUNDARIO">SECUNDARIO</option>
            <option value="SUPERIOR">SUPERIOR</option>
        </select>

        <p>Dirección:</p>
        <input type="text" wire:model="direccion" required>
    @endif

    <br>
    <div>
        <button wire:click="enviar">Enviar</button>
    </div>
</div>
