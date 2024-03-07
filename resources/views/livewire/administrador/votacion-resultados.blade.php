<div>
    <h2>Resultados de la elección</h2>

    <h3>Votantes: {{ $cantidadVotantes }}</h3>
    <ul>
        <p>Total de votantes: {{ $votantes->count() }}</p>
        @foreach ($votantes as $votante)
            <li>{{ $votante->nombres }}</li>
        @endforeach
    </ul>

    <h3>No Votantes</h3>
    <ul>
        <p>Total de no votantes: {{ $noVotantes->count() }}</p>

        @foreach ($noVotantes as $noVotante)
            <li>{{ $noVotante->nombres }}</li>
        @endforeach
    </ul>

    <h3>Resultados de los candidatos</h3>
    <ul>
        <p>Total de candidatos: {{ $resultados->count() }}</p>

        @foreach ($resultados as $resultado)
            <li>Candidato {{ $resultado->candidato_id }} - {{ $resultado->nombres }} - Votos:
                {{ $resultado->total_votos }}</li>
        @endforeach
    </ul>
</div>
