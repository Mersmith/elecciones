<div>
    <h2>Resultados de la elección</h2>

    <h3>Votantes: {{ $cantidadVotantes }} - 100% </h3>
    <ul>
        <p>Total de votantes: {{ $votantes->count() }}</p>
        <p>Porcentaje de votantes: {{ number_format(($votantes->count() / $cantidadVotantes) * 100, 2) }}%</p>
        @foreach ($votantes as $votante)
            <li>{{ $votante->nombres }}</li>
        @endforeach
    </ul>

    <h3>No Votantes</h3>
    <ul>
        <p>Total de no votantes: {{ $noVotantes->count() }}</p>
        <p>Porcentaje de no votantes: {{ number_format(($noVotantes->count() / $cantidadVotantes) * 100, 2) }}%</p>

        @foreach ($noVotantes as $noVotante)
            <li>{{ $noVotante->nombres }}</li>
        @endforeach
    </ul>

    <h3>Resultados de los candidatos</h3>
    <ul>
        <p>Total de candidatos: {{ $resultados->count() }}</p>

        @foreach ($resultados as $resultado)
            @php
                $porcentajeVotos = ($resultado->total_votos /  $votantes->count()) * 100;
            @endphp
            <li>Candidato {{ $resultado->candidato_id }} - {{ $resultado->nombres }} - Votos:
                {{ $resultado->total_votos }} ({{ number_format($porcentajeVotos, 2) }}%)</li>
        @endforeach
    </ul>
</div>
