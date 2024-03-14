@extends('layouts.administracion.administracion')

@section('tituloPagina', 'Crear Elección')

@section('content')
    <div>
        <!--CONTENEDOR CABECERA-->
        <div class="contenedor_administrador_cabecera">
            <!--CONTENEDOR TITULO-->
            <div class="contenedor_titulo_admin">
                <h2>Crear elección</h2>
            </div>
            <!--CONTENEDOR BOTONES-->
            <div class="contenedor_botones_admin">
                <a href="{{ route('administracion.eleccion.vista.todas') }}">
                    <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
            </div>
        </div>

        <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
        <div class="contenedor_administrador_contenido">
            <div class="contenedor_panel_producto_admin">
                <!--CONTENEDOR SUBTITULO-->
                <div class="contenedor_subtitulo_admin">
                    <h3>Formulario</h3>
                </div>
                <form action="{{ route('administracion.eleccion.crear') }}" method="POST" class="formulario">
                    @csrf
                    <!--NOMBRE-->
                    <div class="contenedor_2_elementos">
                        <!--NOMBRE-->
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Nombre: <span class="campo_obligatorio">(Obligatorio)</span></p>
                            <input type="text" name="nombre" required>
                            @error('nombre')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!--FECHA INICIO Y FECHA FIN-->
                    <div class="contenedor_2_elementos">
                        <!--FECHA INICIO-->
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Fecha inicio: <span
                                    class="campo_obligatorio">(Obligatorio)</span>
                            </p>
                            <input type="datetime-local" name="fecha_inicio" required>
                            @error('fecha_inicio')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>
                        <!--FECHA FIN-->
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Fecha fin: <span class="campo_obligatorio">(Obligatorio)</span>
                            </p>
                            <input type="datetime-local" name="fecha_fin" required>
                            @error('fecha_fin')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!--ENVIAR-->
                    <div class="contenedor_1_elementos">
                        <input type="submit" value="Crear">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
