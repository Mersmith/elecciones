@extends('layouts.administracion.administracion')

@section('tituloPagina', 'Roles')

@section('content')
    <div>
        <!--CONTENEDOR CABECERA-->
        <div class="contenedor_administrador_cabecera">
            <!--CONTENEDOR TITULO-->
            <div class="contenedor_titulo_admin">
                <h2>Roles</h2>
            </div>

            <!--CONTENEDOR BOTONES-->
            <div class="contenedor_botones_admin">
                <a href="{{ route('administracion.rol.vista.crear') }}">
                    Nuevo rol <i class="fa-solid fa-square-plus"></i></a>
            </div>
        </div>

        <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
        <div class="contenedor_administrador_contenido">
            <!--TABLA-->
            <div class="contenedor_panel_producto_admin">
                @if ($roles->count())
                    <!--CONTENEDOR SUBTITULO-->
                    <div class="contenedor_subtitulo_admin">
                        <h3>Lista de roles <span> Cantidad: {{ $roles->count() }}</span></h3>
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
                                            Nombre</th>
                                        <th>
                                            Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $rol)
                                        <tr style="text-align: center;">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $rol->nombre }}
                                            </td>
                                            <td>
                                                <a style="color: #009eff;"
                                                    href="{{ route('administracion.rol.vista.ver', $rol->id) }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>

                                                <a style="color: green;"
                                                    href="{{ route('administracion.rol.vista.editar', $rol->id) }}">
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
                        <p>No hay roles.</p>
                        <i class="fa-solid fa-spinner"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
