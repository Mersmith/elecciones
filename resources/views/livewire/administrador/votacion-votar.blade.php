<div>
    @if (session()->has('message'))
        <div>
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div>
            {{ session('error') }}
        </div>
    @endif

    <div>
        <h2>Elección: {{ $eleccion->nombre }}</h2>
        <p>Fecha de Inicio: {{ $eleccion->fecha_inicio }}</p>
        <p>Fecha de Fin: {{ $eleccion->fecha_fin }}</p>
    </div>

    @if ($usuario->socio)
        <div>
            <h2>Hola, {{ $usuario->socio->nombres }}</h2>
        </div>
    @endif

    <div>
        @if ($candidatoId)
            <p>{{ $candidatoSeleccionado->socio->nombres }}</p>
            <button wire:click="votarCandidato({{ $candidatoSeleccionado->id }})">Votar por
                {{ $candidatoSeleccionado->id }}</button>
        @endif

        <div>
            <h2>Candidatos:</h2>
            <p>Buscar candidato:</p>
            <input type="text" wire:model.live="buscarCandidato">
            <br>
            <ul>
                @foreach ($candidatos as $candidato)
                    <li>
                        <label>
                            <input type="radio" wire:model.live="candidatoId" value="{{ $candidato->candidato_id }}">
                            {{ $candidato->candidato_id }} - {{ $candidato->nombres }} -
                            {{ $candidato->apellido_paterno }} - {{ $candidato->apellido_materno }}
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
