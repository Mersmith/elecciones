<div>
    <div>
        <h2>Elección: {{ $eleccion->nombre }}</h2>
        <p>Fecha de Inicio: {{ $eleccion->fecha_inicio }}</p>
        <p>Fecha de Fin: {{ $eleccion->fecha_fin }}</p>
    </div>

    <div style="display: flex;">
        <div>
            <h2>Candidatos:</h2>
            <p>Buscar candidato:</p>
            <input type="text" wire:model.live="buscarCandidato">
            <br>
            <ul>
                @foreach ($candidatos as $candidato)
                    <li>{{ $candidato->nombres }}</li>
                    <button wire:click="quitarCandidato({{ $candidato->socio_id }})">Quitar como candidato</button>
                @endforeach
            </ul>
        </div>

        <div>
            <h2>Socios:</h2>
            <p>Buscar socio:</p>
            <input type="text" wire:model.live="buscarSocio">
            <br>
            <ul>
                @foreach ($socios as $socio)
                    <li>{{ $socio->nombres }}</li>
                    <button wire:click="asignarCandidato({{ $socio->id }})">Asignar como candidato</button>
                @endforeach
            </ul>

            {{ $socios->links() }}
        </div>
    </div>

</div>
