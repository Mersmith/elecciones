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
            <!--ESTADÍSTICA-->
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
                            array_push($label_chart_candidato_nombre, $item->numero_candidato);
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
                                        label: 'RESULTADOS DE LOS 5 PRIMEROS CANDIDATOS',
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

            <!--TABLA CANDIDATOS-->
            <div class="contenedor_panel_producto_admin">
                @if ($resultados->count())
                    <!--CONTENEDOR SUBTITULO-->
                    <div class="contenedor_subtitulo_admin">
                        <h3>Candidatos ({{ $resultados->count() }})
                            <span>Los resultados son.</span>
                        </h3>
                    </div>

                    <!--CONTENEDOR BOTONES-->
                    <div class="contenedor_botones_admin">
                        <button>
                            EXCEL <i class="fa-regular fa-file-excel"></i>
                        </button>
                    </div>

                    <!--TABLA-->
                    <div class="tabla_administrador py-4 overflow-x-auto">
                        <div class="inline-block min-w-full overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th>
                                            Nº</th>
                                        <th>
                                            Número candidato</th>
                                        <th>
                                            Nombres</th>
                                        <th>
                                            Votos</th>
                                        <th>
                                            Porcentaje</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resultados as $resultado)
                                        @php
                                            $porcentajeVotos = ($resultado->total_votos / $votantes->count()) * 100;
                                        @endphp
                                        <tr style="text-align: center;">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $resultado->numero_candidato }}
                                            </td>
                                            <td>
                                                {{ $resultado->nombres }}
                                                {{ $resultado->apellido_paterno }}
                                                {{ $resultado->apellido_materno }}
                                            </td>
                                            <td>
                                                {{ $resultado->total_votos }}
                                            </td>
                                            <td>
                                                {{ number_format($porcentajeVotos, 2) }}%
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="contenedor_no_existe_elementos">
                        <p>No hay candidatos.</p>
                        <i class="fa-solid fa-spinner"></i>
                    </div>
                @endif
            </div>

            <!--TABLA VOTANTES-->
            <div class="contenedor_panel_producto_admin">
                @if ($votantes->count())
                    <!--CONTENEDOR SUBTITULO-->
                    <div class="contenedor_subtitulo_admin">
                        <h3>Votaron ({{ $votantes->count() }})
                            <span> Porcentaje:
                                {{ number_format(($votantes->count() / $cantidadVotantes) * 100, 2) }}%</span>
                        </h3>
                    </div>

                    <!--CONTENEDOR BOTONES-->
                    <div class="contenedor_botones_admin">
                        <a href="{{ route('generar.excel') }}">
                            EXCEL <i class="fa-regular fa-file-excel"></i>
                        </a>
                    </div>

                    <!--TABLA-->
                    <div class="tabla_administrador py-4 overflow-x-auto">
                        <div class="inline-block min-w-full overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th>
                                            Nº</th>
                                        <th>
                                            Nombres</th>
                                        <th>
                                            Edad</th>
                                        <th>
                                            Exonerado mayor de 70 años</th>
                                        <th>
                                            Voto por</th>
                                        <th>
                                            IP voto</th>
                                        <th>
                                            Fecha voto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($votantes as $votante)
                                        <tr style="text-align: center;">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $votante->nombres }} {{ $votante->apellido_paterno }}
                                                {{ $votante->apellido_materno }}
                                            </td>
                                            <td>
                                                {{ $votante->edad }}
                                            </td>
                                            <td>
                                                @if ($votante->edad > 70)
                                                    <span class="exonerado">EXONERADO</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $votante->numero_candidato }}
                                            </td>
                                            <td>
                                                {{ $votante->ip_voto }}
                                            </td>
                                            <td>
                                                {{ $votante->created_at }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="contenedor_no_existe_elementos">
                        <p>No hay votantes.</p>
                        <i class="fa-solid fa-spinner"></i>
                    </div>
                @endif
            </div>

            <!--TABLA NO VOTARON-->
            <div class="contenedor_panel_producto_admin">
                @if ($noVotantes->count())
                    <!--CONTENEDOR SUBTITULO-->
                    <div class="contenedor_subtitulo_admin">
                        <h3>No votaron ({{ $noVotantes->count() }})
                            <span> Porcentaje:
                                {{ number_format(($noVotantes->count() / $cantidadVotantes) * 100, 2) }}%</span>
                        </h3>
                    </div>

                    <!--CONTENEDOR BOTONES-->
                    <div class="contenedor_botones_admin">
                        <a href="{{ route('generar.excel') }}">
                            EXCEL <i class="fa-regular fa-file-excel"></i>
                        </a>
                    </div>

                    <!--TABLA-->
                    <div class="tabla_administrador py-4 overflow-x-auto">
                        <div class="inline-block min-w-full overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th>
                                            Nº</th>
                                        <th>
                                            Código socio</th>
                                        <th>
                                            Nombres y apellidos</th>
                                        <th>
                                            DNI</th>
                                        <th>
                                            Fecha nacimiento</th>
                                        <th>
                                            Edad</th>
                                        <th>
                                            Exonerado mayor de 70 años</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($noVotantes as $noVotante)
                                        <tr style="text-align: center;">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $noVotante->codigo }}
                                            </td>
                                            <td>
                                                {{ $noVotante->nombres }} {{ $noVotante->apellido_paterno }}
                                                {{ $noVotante->apellido_materno }}
                                            </td>
                                            <td>
                                                {{ $noVotante->dni }}
                                            </td>
                                            <td>
                                                {{ $noVotante->fecha_nacimiento }}
                                            </td>
                                            <td>
                                                {{ $noVotante->edad }}
                                            </td>
                                            <td>
                                                @if ($noVotante->edad > 70)
                                                    <span class="exonerado">EXONERADO</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="contenedor_no_existe_elementos">
                        <p>No hay socios que no votaron.</p>
                        <i class="fa-solid fa-spinner"></i>
                    </div>
                @endif
            </div>
        </div>
    @else
        <p>No votan</p>
    @endif
</div>
