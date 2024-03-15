@extends('layouts.administracion.administracion')

@section('tituloPagina', 'Usuario')

@section('content')
    <div>
        <!--CONTENEDOR CABECERA-->
        <div class="contenedor_administrador_cabecera">
            <!--CONTENEDOR TITULO-->
            <div class="contenedor_titulo_admin">
                <h2>Editar usuario: {{ $usuario->name }}</h2>
            </div>
            <!--CONTENEDOR BOTONES-->
            <div class="contenedor_botones_admin">
                <a href="{{ route('administracion.usuario.todas') }}">
                    <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>

                <a href="{{ route('administracion.usuario.crear') }}">
                    Crear <i class="fa-solid fa-square-plus"></i></a>

                <a href="{{ route('administracion.usuario.vista.editar', $usuario->id) }}">
                    Editar <i class="fa-solid fa-pencil"></i></a>

                <form action="{{ route('administracion.usuario.eliminar', $usuario->id) }}" method="POST">
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
                    <h3>Datos del Usuario:</h3>
                </div>

                <div>
                    <p><strong>Nombre: </strong>{{ $usuario->name }} </p>
                </div>
            </div>
        </div>
    </div>
@endsection
