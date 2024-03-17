@extends('layouts.socio.socio')

@section('tituloPagina', 'Mi perfil')

@section('content')
    <div>
        <!--CONTENEDOR CABECERA-->
        <div class="contenedor_administrador_cabecera">
            <!--CONTENEDOR TITULO-->
            <div class="contenedor_titulo_admin">
                <h2>Mi perfil</h2>
            </div>
        </div>

        <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
        <div class="contenedor_administrador_contenido">
            <!--DATOS-->
            <div class="contenedor_panel_producto_admin">
                <!--CONTENEDOR SUBTITULO-->
                <div class="contenedor_subtitulo_admin">
                    <h3>Datos personales:</h3>
                </div>

                <div>
                    <p><strong>Nombre: </strong>{{ $usuario->socio->nombres }} </p>
                    <p><strong>Apellido paterno: </strong>{{ $usuario->socio->apellido_paterno }} </p>
                    <p><strong>Apellido materno: </strong>{{ $usuario->socio->apellido_materno }} </p>
                    <p><strong>Código socio: </strong>{{ $usuario->socio->codigo }} </p>
                    <p><strong>DNI: </strong>{{ $usuario->socio->dni }} </p>
                    <p><strong>Celular: </strong>{{ $usuario->socio->celular }} </p>
                    <p><strong>Sexo: </strong>{{ $usuario->socio->sexo }} </p>
                    <p><strong>Fecha de nacimiento: </strong>{{ $usuario->socio->fecha_nacimiento }} </p>
                    <p><strong>Edad: </strong>{{ $usuario->socio->edad }} </p>
                    <p><strong>Condición: </strong>{{ $usuario->socio->condicion }} </p>
                    <p><strong>Grado: </strong>{{ $usuario->socio->grado }} </p>
                    <p><strong>Dirección: </strong>{{ $usuario->socio->direccion }} </p>
                </div>
            </div>
        </div>
    </div>
@endsection
