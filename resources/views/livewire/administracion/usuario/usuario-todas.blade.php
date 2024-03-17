@section('tituloPagina', 'Usuarios')
<div>
    <!--CONTENEDOR CABECERA-->
    <div class="contenedor_administrador_cabecera">
        <!--CONTENEDOR TITULO-->
        <div class="contenedor_titulo_admin">
            <h2>Usuarios</h2>
        </div>

        <!--CONTENEDOR BOTONES-->
        <div class="contenedor_botones_admin">
            <a href="">
                Nuevo usuario <i class="fa-solid fa-square-plus"></i></a>
        </div>
    </div>

    <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
    <div class="contenedor_administrador_contenido">
        <!--BUSCADOR-->
        <div class="contenedor_panel_producto_admin formulario">
            <div class="contenedor_elemento_item">
                <p class="estilo_nombre_input">Buscar usuario: <span class="campo_opcional">(Opcional)</span> </p>
                <input type="text" wire:model.live="buscarUsuario" placeholder="Buscar...">
            </div>
        </div>

        <!--TABLA-->
        <div class="contenedor_panel_producto_admin">
            @if ($usuarios->count())
                <!--CONTENEDOR SUBTITULO-->
                <div class="contenedor_subtitulo_admin">
                    <h3>Lista de usuarios <span> Cantidad: {{ $cantidad_total_usuarios }}</span></h3>
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
                                        Email</th>
                                    <th>
                                        Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr style="text-align: center;">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $usuario->name }}
                                        </td>
                                        <td>
                                            {{ $usuario->email }}
                                        </td>
                                        <td>
                                            <a style="color: #009eff;" href="{{ route('administracion.usuario.vista.ver', $usuario->id) }}">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a style="color: green;" href="{{ route('administracion.usuario.vista.editar', $usuario->id) }}">
                                                <span><i class="fa-solid fa-pencil"></i></span>
                                            </a>

                                            <a style="color: brown;" href="{{ route('administracion.usuario.vista.asignar.rol', $usuario->id) }}">
                                                <span><i class="fa-solid fa-user-gear"></i></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                @if ($usuarios->hasPages())
                    <div>
                        {{ $usuarios->links('pagination::tailwind') }}
                    </div>
                @endif
            @else
                <div class="contenedor_no_existe_elementos">
                    <p>No hay usuarios.</p>
                    <i class="fa-solid fa-spinner"></i>
                </div>
            @endif
        </div>
    </div>
</div>
