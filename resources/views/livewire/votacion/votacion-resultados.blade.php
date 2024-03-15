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
                $porcentajeVotos = ($resultado->total_votos / $votantes->count()) * 100;
            @endphp
            <li>Candidato {{ $resultado->candidato_id }} - {{ $resultado->nombres }} - Votos:
                {{ $resultado->total_votos }} ({{ number_format($porcentajeVotos, 2) }}%)</li>
        @endforeach
    </ul>

    <!--ESTADISTICA RESULTADOS-->
    <div class="contenedor_panel_producto_admin">
        @php
            $label_chart_candidato_nombre = [];
            $data_chart_candidato_votos = [];
        @endphp

        @if (count($resultados))
            @php
                foreach ($resultados as $item) {
                    array_push($label_chart_candidato_nombre, $item->nombres);
                    array_push($data_chart_candidato_votos, $item->total_votos);
                }
            @endphp
            <canvas id="chart_votacion_resultados"></canvas>
        @endif
    </div>
</div>

@script
    <script>
        const ctx_chart_votacion_resultados = document.getElementById('chart_votacion_resultados');
        new Chart(ctx_chart_votacion_resultados, {
            type: 'bar',
            data: {
                labels: {{ Js::from($label_chart_candidato_nombre) }},
                datasets: [{
                    label: 'RESULSTADOS DE LOS 5 PRIMEROS EN LAS ELECCIONES',
                    data: {{ Js::from($data_chart_candidato_votos) }},
                    borderWidth: 1,
                    backgroundColor: ['rgba(255, 99, 132, 0.8)', 'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)', 'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)', 'rgba(255, 159, 64, 0.8)', 'rgba(255, 0, 0, 0.8)',
                        'rgba(0, 255, 0, 0.8)', 'rgba(0, 0, 255, 0.8)', 'rgba(255, 255, 0, 0.8)',
                        'rgba(255, 0, 255, 0.8)', 'rgba(0, 255, 255, 0.8)', 'rgba(128, 0, 0, 0.8)',
                        'rgba(0, 128, 0, 0.8)', 'rgba(0, 0, 128, 0.8)'
                    ]
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endscript
