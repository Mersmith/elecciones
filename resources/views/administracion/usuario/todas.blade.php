@extends('layouts.administracion.administracion')

@section('tituloPagina', 'USUARIOS')

@section('content')
    <div>
        <!--CONTENEDOR CABECERA-->
        <div class="contenedor_administrador_cabecera">
            <!--CONTENEDOR TITULO-->
            <div class="contenedor_titulo_admin">
                <h2>Usuarios</h2>
            </div>

            <!--CONTENEDOR BOTONES-->
            <div class="contenedor_botones_admin">
                <a href="{{ route('administracion.usuario.crear') }}">
                    Nuevo usuario <i class="fa-solid fa-square-plus"></i></a>
            </div>
        </div>

        <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
        <div class="contenedor_administrador_contenido">


            <ul>
                @foreach ($usuarios as $item)
                    <li>
                        <span>{{ $item->name }}</span>
                        <a href="{{ route('administracion.usuario.vista.ver', $item->id) }}">Ver</a>
                        <a href="{{ route('administracion.usuario.vista.editar', $item->id) }}">Editar</a>
                        <a href="{{ route('administracion.usuario.vista.asignar.rol', $item->id) }}">Rol</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
