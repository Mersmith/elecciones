@extends('layouts.socio.socio')

@section('tituloPagina', 'Mis elecciones')

@section('content')
    <div>
        <h2>elecciones</h2>
        <p>Hora actual: {{ \Carbon\Carbon::now() }}</p>

        @foreach ($eleccionesActivas as $eleccion)
            <p>{{ $eleccion->nombre }} - {{ $eleccion->fecha_fin_elecciones }}</p>
            <a style="color: navy;" href="{{ route('socio.eleccion.votacion.votar', $eleccion) }}">
                <span><i class="fa-solid fa-hand-pointer"></i></span> VOTAR
            </a>
        @endforeach
    </div>
@endsection
