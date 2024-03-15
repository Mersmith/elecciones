@extends('layouts.administracion.administracion')

@section('tituloPagina', 'Crear Rol')

@section('content')
    <div>
        <!--CONTENEDOR CABECERA-->
        <div class="contenedor_administrador_cabecera">
            <!--CONTENEDOR TITULO-->
            <div class="contenedor_titulo_admin">
                <h2>Asignar rol a: {{ $usuario->name }}</h2>
            </div>
            <!--CONTENEDOR BOTONES-->
            <div class="contenedor_botones_admin">
                <a href="{{ route('administracion.usuario.todas') }}">
                    <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
            </div>
        </div>

        <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
        <div class="contenedor_administrador_contenido">
            <div class="contenedor_panel_producto_admin">
                <!--CONTENEDOR SUBTITULO-->
                <div class="contenedor_subtitulo_admin">
                    <h3>Formulario</h3>
                </div>

                <form action="{{ route('administracion.usuario.asignar.rol', $usuario->id) }}" method="POST"
                    class="formulario">
                    @csrf
                    @method('PUT')

                    <!--ROL-->
                    <div class="contenedor_1_elementos_100">
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Roles: <span class="campo_obligatorio">(Obligatorio)</span></p>
                            @foreach ($roles as $rol)
                                <label for="">
                                    {{ $rol->nombre }}
                                    <input type="checkbox" name="roles[]" value="{{ $rol->id }}"
                                        {{ $usuario->roles->contains($rol->id) ? 'checked' : '' }}>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!--ENVIAR-->
                    <div class="contenedor_1_elementos">
                        <input type="submit" value="Crear">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
