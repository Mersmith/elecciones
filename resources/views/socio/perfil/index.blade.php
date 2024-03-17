@extends('layouts.socio.socio')

@section('tituloPagina', 'Mi perfil')

@section('content')
    <div>
       <h2>perfil</h2>
       <p>{{$usuario->socio->nombres}}</p>
    </div>
@endsection
