@extends('layouts.socio.socio')

@section('tituloPagina', 'Mis votos')

@section('content')
    <div>
        <!--CONTENEDOR CABECERA-->
        <div class="contenedor_administrador_cabecera">
            <!--CONTENEDOR TITULO-->
            <div class="contenedor_titulo_admin">
                <h2>Mis votos</h2>
            </div>
        </div>

        <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
        <div class="contenedor_administrador_contenido">
            <!--TABLA-->
            <div class="contenedor_panel_producto_admin">
                @if ($votos->count())
                    <!--CONTENEDOR SUBTITULO-->
                    <div class="contenedor_subtitulo_admin">
                        <h3>Lista de votos <span> Cantidad: {{ $votos->count() }}</span></h3>
                    </div>

                    <!--CONTENEDOR SUBTITULO-->
                    <div class="contenedor_subtitulo_admin">
                        <span>Hora que entraste: {{ \Carbon\Carbon::now() }}</span>
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
                                            En la elección</th>
                                        <th>
                                            Votaste por</th>
                                        <th>
                                            Fecha</th>
                                        <th>
                                            Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($votos as $voto)
                                        <tr style="text-align: center;">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $voto->nombre_eleccion }}
                                            </td>
                                            <td>
                                                {{ $voto->nombre_candidato }}
                                            </td>
                                            <td>
                                                {{ $voto->created_at }}
                                            </td>
                                            <td>
                                                <a style="color: #009eff; font-weight: 700;"
                                                    href="{{ route('socio.eleccion.votacion.mi.voto', $voto->id) }}">
                                                    <span><i class="fa-solid fa-eye"></i></span> VER VOTO
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="contenedor_no_existe_elementos">
                        <p>No hay votos.</p>
                        <i class="fa-solid fa-spinner"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
