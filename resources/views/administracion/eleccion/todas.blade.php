@extends('layouts.administracion.administracion')

@section('tituloPagina', 'Elecciones')

@section('content')
    <div>
        <!--CONTENEDOR CABECERA-->
        <div class="contenedor_administrador_cabecera">
            <!--CONTENEDOR TITULO-->
            <div class="contenedor_titulo_admin">
                <h2>Elecciones</h2>
            </div>

            <!--CONTENEDOR BOTONES-->
            <div class="contenedor_botones_admin">
                <a href="{{ route('administracion.eleccion.vista.crear') }}">
                    Nueva elección <i class="fa-solid fa-square-plus"></i></a>
            </div>
        </div>

        <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
        <div class="contenedor_administrador_contenido">
            <!--TABLA-->
            <div class="contenedor_panel_producto_admin">
                @if ($elecciones->count())
                    <!--CONTENEDOR SUBTITULO-->
                    <div class="contenedor_subtitulo_admin">
                        <h3>Lista de elecciones <span> Cantidad: {{ $elecciones->count() }}</span></h3>
                    </div>

                    <!--CONTENEDOR BOTONES-->
                    <div class="contenedor_botones_admin">
                        <button>
                            PDF <i class="fa-solid fa-file-pdf"></i>
                        </button>
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
                                            Nombres</th>
                                        <th>
                                            Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($elecciones as $eleccion)
                                        <tr style="text-align: center;">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $eleccion->nombre }}
                                            </td>
                                            <td>
                                                <a style="color: #009eff;"
                                                    href="{{ route('administracion.eleccion.vista.ver', $eleccion->id) }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>

                                                <a style="color: green;"
                                                    href="{{ route('administracion.eleccion.vista.editar', $eleccion->id) }}">
                                                    <span><i class="fa-solid fa-pencil"></i></span>
                                                </a>

                                                <a style="color: green;"
                                                    href="{{ route('administracion.eleccion.asignar.candidato', $eleccion->id) }}">
                                                    <span><i class="fa-solid fa-pencil"></i></span>
                                                </a>

                                                <a style="color: green;"
                                                    href="{{ route('eleccion.votacion.votar', $eleccion->id) }}">
                                                    <span><i class="fa-solid fa-pencil"></i></span>
                                                </a>

                                                <a style="color: green;"
                                                    href="{{ route('administracion.eleccion.votacion.resultados', $eleccion->id) }}">
                                                    <span><i class="fa-solid fa-pencil"></i></span>
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
