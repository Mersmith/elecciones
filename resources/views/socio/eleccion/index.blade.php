@extends('layouts.socio.socio')

@section('tituloPagina', 'Mis elecciones')

@section('content')
    <div>
        <!--CONTENEDOR CABECERA-->
        <div class="contenedor_administrador_cabecera">
            <!--CONTENEDOR TITULO-->
            <div class="contenedor_titulo_admin">
                <h2>Elecciones disponibles</h2>
            </div>
        </div>

        <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
        <div class="contenedor_administrador_contenido">
            <!--TABLA-->
            <div class="contenedor_panel_producto_admin">
                @if ($eleccionesActivas->count())
                    <!--CONTENEDOR SUBTITULO-->
                    <div class="contenedor_subtitulo_admin">
                        <h3>Lista de elecciones <span> Cantidad: {{ $eleccionesActivas->count() }}</span></h3>
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
                                            Nombres</th>
                                        <th>
                                            Convocatoria inicio</th>
                                        <th>
                                            Convocatoria fin</th>
                                        <th>
                                            Inicio votación</th>
                                        <th>
                                            Fin votación</th>
                                        <th>
                                            Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eleccionesActivas as $eleccion)
                                        <tr style="text-align: center;">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $eleccion->nombre }}
                                            </td>
                                            <td>
                                                {{ $eleccion->fecha_inicio_convocatoria }}
                                            </td>
                                            <td>
                                                {{ $eleccion->fecha_fin_convocatoria }}
                                            </td>
                                            <td>
                                                {{ $eleccion->fecha_inicio_elecciones }}
                                            </td>
                                            <td style="color: green;">
                                                {{ $eleccion->fecha_fin_elecciones }}
                                            </td>
                                            <td>
                                                <a style="color: navy; font-weight: 700;"
                                                    href="{{ route('socio.eleccion.votacion.votar', $eleccion) }}">
                                                    <span><i class="fa-solid fa-hand-pointer"></i></span> VOTAR
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
                        <p>No hay elecciones.</p>
                        <i class="fa-solid fa-spinner"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
