@extends('layouts.socio.socio')

@section('tituloPagina', 'Mis votos')

@section('content')
    <div>
        <h2>votos</h2>

        @foreach ($votos as $voto)
            <p>En la Elección: {{ $voto->nombre_eleccion }}</p>
            <p>Votaste por: {{ $voto->nombre_candidato }}</p>
            <p>En la Fecha: {{ $voto->created_at }} </p>
        @endforeach
    </div>
@endsection
