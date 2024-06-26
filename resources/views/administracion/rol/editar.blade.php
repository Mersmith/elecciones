@extends('layouts.administracion.administracion')

@section('tituloPagina', 'Editar Rol')

@section('content')
    <div>
        <!--CONTENEDOR CABECERA-->
        <div class="contenedor_administrador_cabecera">
            <!--CONTENEDOR TITULO-->
            <div class="contenedor_titulo_admin">
                <h2>Editar rol</h2>
            </div>
            <!--CONTENEDOR BOTONES-->
            <div class="contenedor_botones_admin">
                <a href="{{ route('administracion.rol.vista.todas') }}">
                    <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>

                <a href="{{ route('administracion.rol.vista.crear') }}">
                    Crear <i class="fa-solid fa-square-plus"></i></a>
            </div>
        </div>

        <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
        <div class="contenedor_administrador_contenido">
            <div class="contenedor_panel_producto_admin">
                <!--CONTENEDOR SUBTITULO-->
                <div class="contenedor_subtitulo_admin">
                    <h3>Formulario</h3>
                </div>

                <form action="{{ route('administracion.rol.editar', $rol->id) }}" method="POST" class="formulario">
                    @csrf
                    @method('PUT')
                    <!--NOMBRE-->
                    <div class="contenedor_2_elementos">
                        <!--NOMBRE-->
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Nombre: <span class="campo_obligatorio">(Obligatorio)</span></p>
                            <input type="text" name="nombre" value="{{ old('nombre', $rol->nombre) }}" required>
                            @error('nombre')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!--ENVIAR-->
                    <div class="contenedor_1_elementos">
                        <input type="submit" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
