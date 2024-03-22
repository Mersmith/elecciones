<!DOCTYPE html>
<html lang="es-PE">

<head>
    <!--META TAGS-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--TITULO-->
    <title>{{ $titulo }}</title>

    <!--CSS-->
    <link rel="stylesheet" href="{{ public_path('socio/estilos-constancia-votacion.css') }}">
</head>

<body>
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
            <img src="{{ public_path('/storage/' . $candidato->socio->imagenPerfil->imagen_perfil_ruta) }}"
                alt="">
        @else
            <img src="{{ public_path('imagenes/perfil/sin_foto_perfil.png') }}" alt="">
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
    </div>

</body>

</html>
