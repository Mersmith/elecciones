<div>
    <div>
        <h2>Elección: {{ $eleccion->nombre }}</h2>
        <p>Fecha de Inicio: {{ $eleccion->fecha_inicio }}</p>
        <p>Fecha de Fin: {{ $eleccion->fecha_fin }}</p>
    </div>

    <div>
        <h2>Socios:</h2>
        <p>Buscar socio:</p>
        <input type="text" wire:model.live="buscarSocio">
        <br>
        <ul>
            @foreach ($socios as $socio)
                <li>{{ $socio->nombres }}</li>
            @endforeach
        </ul>
        
        {{ $socios->links() }}
    </div>

    <button>Asignar socio a candidato</button>
</div>
