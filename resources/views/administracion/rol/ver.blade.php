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

                <a href="{{ route('administracion.rol.vista.crear') }}">
                    Editar <i class="fa-solid fa-pencil"></i></a>

                <form action="{{ route('administracion.rol.eliminar', $rol->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
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
@endsection
