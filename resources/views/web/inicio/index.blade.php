@extends('layouts.web.web')

@section('tituloPagina', 'Inicio')

@section('content')
    <div>
        <!--GRID CONTENEDOR LOGIN-->
        <div class="contenedor_login">
            <!--GRID LOGIN IMAGEN-->
            <div class="contenedor_login_imagen">
                <!--IMAGEN-->
                <img src="{{ asset('imagenes/sesion/1.jpg') }}" alt="" class="imagen_fondo" />

                <div class="centrar_contenido">
                    <!--LOGO-->
                    <div class="contenedor_logo_inicio">
                        <a>
                            <img src="{{ asset('imagenes/empresa/logo-2.png') }}" alt="" />
                        </a>

                        @if ($eleccion)
                            <div class="contenedor_botones">
                                @if ($socio)
                                    <div>
                                        <p>Hola, socio ya puedes votar {{ $socio->nombres }} </p>
                                        <div>
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf
                                                <a href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                                    {{ __('Cerrar') }}
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                @endif

                                <a href="{{ route('eleccion.votacion.votar', $eleccion) }}" class="boton_votar">VOTAR</a>
                                <a href="{{ route('eleccion.votacion.resultados', $eleccion->id) }}"
                                    class="boton_resultados">RESULTADOS</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
