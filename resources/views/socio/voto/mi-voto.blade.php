@extends('layouts.socio.socio')

@section('tituloPagina', 'Mis votos')

@section('content')
    <div>
        <!--CONTENEDOR CABECERA-->
        <div class="contenedor_administrador_cabecera">
            <!--CONTENEDOR TITULO-->
            <div class="contenedor_titulo_admin">
                <h2>Mis voto</h2>
            </div>
        </div>

        <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
        <div class="contenedor_administrador_contenido">
            <!--TABLA-->
            <div class="contenedor_panel_producto_admin contenedor_constancia_votacion_centrar">
                @if ($votacion)
                    <div class="contenedor_constancia_votacion">
                        <h3>{{ $eleccion->nombre }}</h3>
                        <p><span>Inicio elección:</span> {{ $eleccion->fecha_inicio_elecciones }}</p>
                        <p><span>Fin elección:</span> {{ $eleccion->fecha_fin_elecciones }}</p>

                        <br>

                        <p><span>Tus datos:</p>
                        <p><span>Nombres: </span>{{ $socio->nombres }} {{ $socio->apellido_paterno }}
                            {{ $socio->apellido_materno }}</p>
                        <p><span>DNI: </span>{{ $socio->dni }}</p>
                        <p><span>Edad:</span> {{ $socio->edad }}
                            @if ($socio->edad > 70)
                                <span class="exonerado">EXONERADO</span>
                            @endif
                        </p>

                        <br>

                        <p><span>Votaste por:</p>
                        @if ($candidato->socio?->imagenPerfil)
                            <img src="{{ Storage::url($candidato->socio->imagenPerfil->imagen_perfil_ruta) }}" />
                        @else
                            <img src="{{ asset('imagenes/perfil/sin_foto_perfil.png') }}">
                        @endif
                        @if ($candidato->socio)
                            <p><span>Candidato:</span> {{ $candidato->socio->nombres }}
                                {{ $candidato->socio->apellido_paterno }}
                                {{ $candidato->socio->apellido_materno }}</p>
                        @else
                            <p>VOTO EN BLANCO</p>
                        @endif
                        <p><span>N° Candidato:</span> {{ $candidato->numero_candidato }} </p>
                        <p><span>Hora que votaste:</span> {{ $votacion->created_at }}</p>
                        <p><span>IP voto:</span> {{ $votacion->ip_voto }}</p>

                        <br>

                        <a href="{{ route('pdf.constancia.votacion', $votacion->id) }}">DESCARGAR CONSTANCIA</a>
                    </div>
                @else
                    <div class="contenedor_no_existe_elementos">
                        <p>No hay voto.</p>
                        <i class="fa-solid fa-spinner"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
