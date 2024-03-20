@section('tituloPagina', 'Resultados')

<div>
    <!--CONTENEDOR CABECERA-->
    <div class="contenedor_administrador_cabecera">
        <!--CONTENEDOR TITULO-->
        <div class="contenedor_titulo_admin">
            <h2>Resultados de la elección</h2>
        </div>
        <!--CONTENEDOR BOTONES-->
        <div class="contenedor_botones_admin">
            <a href="{{ route('administracion.eleccion.vista.todas') }}">
                <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
        </div>
    </div>

    @if ($votantes->count())

        <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
        <div class="contenedor_administrador_contenido">
            <div class="contenedor_panel_producto_admin">
                <!--CONTENEDOR SUBTITULO-->
                <div class="contenedor_subtitulo_admin">
                    <h3>Cantidad votantes ({{ $cantidadVotantes }}) <span> Porcentaje: 100%</span></h3>
                </div>

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
                @endif
            </div>
        </div>

        <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
        <div class="contenedor_administrador_contenido">
            <div class="contenedor_panel_producto_admin">
                <!--CONTENEDOR SUBTITULO-->
                <div class="contenedor_subtitulo_admin">
                    <h3>Candidatos ({{ $resultados->count() }}) <span>Los resultados son.</span></h3>
                </div>
                @foreach ($resultados as $resultado)
                    @php
                        $porcentajeVotos = ($resultado->total_votos / $votantes->count()) * 100;
                    @endphp
                    <li>N° {{ $resultado->numero_candidato }} - {{ $resultado->nombres }}
                        {{ $resultado->apellido_paterno }}
                        {{ $resultado->apellido_materno }} - Votos:
                        {{ $resultado->total_votos }} ({{ number_format($porcentajeVotos, 2) }}%)</li>
                @endforeach
            </div>
        </div>

        <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
        <div class="contenedor_administrador_contenido">
            <div class="contenedor_panel_producto_admin">
                <!--CONTENEDOR SUBTITULO-->
                <div class="contenedor_subtitulo_admin">
                    <h3>Votaron ({{ $votantes->count() }}) <span> Porcentaje:
                            {{ number_format(($votantes->count() / $cantidadVotantes) * 100, 2) }}%</span></h3>
                    <a href="{{ route('generar.excel') }}">EXCEL</a>
                </div>
                @foreach ($votantes as $votante)
                    <li>{{ $votante->nombres }} {{ $votante->apellido_paterno }} {{ $votante->apellido_materno }}
                        @if ($votante->edad > 70)
                            - <span class="exonerado">EXONERADO</span>
                        @endif
                    </li>
                @endforeach
            </div>
        </div>

        <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
        <div class="contenedor_administrador_contenido">
            <div class="contenedor_panel_producto_admin">
                <!--CONTENEDOR SUBTITULO-->
                <div class="contenedor_subtitulo_admin">
                    <h3>No votaron ({{ $noVotantes->count() }}) <span> Porcentaje:
                            {{ number_format(($noVotantes->count() / $cantidadVotantes) * 100, 2) }}%</span></h3>
                </div>
                @foreach ($noVotantes as $noVotante)
                    <li>{{ $noVotante->nombres }} {{ $noVotante->apellido_paterno }}
                        {{ $noVotante->apellido_materno }}
                        @if ($noVotante->edad > 70)
                            - <span class="exonerado">EXONERADO</span>
                        @endif
                    </li>
                @endforeach
            </div>
        </div>
    @else
        <p>No votan</p>
    @endif
</div>
