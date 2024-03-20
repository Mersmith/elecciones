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
</head>

<body>
    <h1>Elección: {{ $eleccion->nombre }}</h1>
    <p>Inicio elección: {{ $eleccion->fecha_inicio_elecciones }}</p>
    <p>Fin elección: {{ $eleccion->fecha_fin_elecciones }}</p>

    <p>Votante: {{ $socio->nombres }} {{ $socio->apellido_paterno }} {{ $socio->apellido_materno }}</p>
    <p>DNI: {{ $socio->dni }}</p>
    <p>Edad: {{ $socio->edad }}
        @if ($socio->edad > 70)
            <span class="exonerado">EXONERADO</span>
        @endif
    </p>

    @if ($candidato->socio->imagenPerfil)
        <img src="{{ Storage::url($candidato->socio->imagenPerfil->imagen_perfil_ruta) }}" />
    @else
        <img src="{{ asset('imagenes/perfil/sin_foto_perfil.png') }}">
    @endif
    <p>Candidato: {{ $candidato->socio->nombres }} {{ $candidato->socio->apellido_paterno }}
        {{ $candidato->socio->apellido_materno }}</p>
    <p>N° Candidato: {{ $candidato->numero_candidato }} </p>

    <p>Hora que votaste: {{ $votacion->created_at }}</p>
    <p>IP voto: {{ $votacion->ip_voto }}</p>


</body>

</html>
