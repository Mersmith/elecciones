@extends('layouts.administracion.administracion')

@section('tituloPagina', 'Rol')

@section('content')
    <div>
        <!--CONTENEDOR CABECERA-->
        <div class="contenedor_administrador_cabecera">
            <!--CONTENEDOR TITULO-->
            <div class="contenedor_titulo_admin">
                <h2>Editar rol: {{ $rol->nombre }}</h2>
            </div>
            <!--CONTENEDOR BOTONES-->
            <div class="contenedor_botones_admin">
                <a href="{{ route('administracion.rol.vista.todas') }}">
                    <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>

                <a href="{{ route('administracion.rol.vista.crear') }}">
                    Crear <i class="fa-solid fa-square-plus"></i></a>

                <a href="{{ route('administracion.rol.vista.editar', $rol->id) }}">
                    Editar <i class="fa-solid fa-pencil"></i></a>

                <form action="{{ route('administracion.rol.eliminar', $rol->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a onclick="return funcionEliminar({{ $rol->id }});">
                        <i class="fa-solid fa-trash" style="color: red;"></i>
                        Eliminar</a>
                    <button type="submit" id="boton-eliminar-{{ $rol->id }}" style="display: none;">Eliminar</button>
                </form>
            </div>
        </div>

        <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
        <div class="contenedor_administrador_contenido">
            <!--DATOS-->
            <div class="contenedor_panel_producto_admin">
                <!--CONTENEDOR SUBTITULO-->
                <div class="contenedor_subtitulo_admin">
                    <h3>Datos del Rol:</h3>
                </div>

                <div>
                    <p><strong>Nombre: </strong>{{ $rol->nombre }} </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function funcionEliminar(id) {
            event.preventDefault();
            Swal.fire({
                title: '¿Quieres eliminar?',
                text: "No podrás recupar este permiso.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("boton-eliminar-" + id).click();
                    Swal.fire(
                        '¡Eliminado!',
                        'Eliminaste correctamente.',
                        'success'
                    );
                }
            })
        }
    </script>
@endsection
