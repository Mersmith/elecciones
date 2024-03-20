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

                        <div class="contenedor_botones">
                            <a href="{{ route('ingresar.socio') }}" class="boton_votar">Ingresa para votar.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ayuda_whatsapp_grupo">
            <a href="https://chat.whatsapp.com/GhDozN5vTax5QUGw2t9pmm" target="_blank">
                <img src="{{ asset('imagenes/empresa/logo-consejo-eleccion.png') }}" alt="" />
            </a>
        </div>
    </div>
@endsection
