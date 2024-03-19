@section('tituloPagina', 'Votar')

<div>
    <!--CONTENEDOR CABECERA-->
    <div class="contenedor_administrador_cabecera">
        <!--CONTENEDOR TITULO-->
        <div class="contenedor_titulo_admin">
            <h2>Votar</h2>
        </div>
        <!--CONTENEDOR BOTONES-->
        <div class="contenedor_botones_admin">
            <a href="{{ route('socio.eleccion') }}">
                <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
        </div>
    </div>

    <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
    <div class="contenedor_administrador_contenido">
        <div class="contenedor_panel_producto_admin">
            <!--CONTENEDOR VOTAR-->
            <div class="contenedor_votar">
                <div class="contenedor_votar_titulo">
                    <h3>{{ $eleccion->nombre }}</h3>
                    <p> <span> Fecha:
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $eleccion->fecha_inicio_elecciones)->toDateString() }}
                        </span></p>
                    <p>
                        <span>
                            Empezó
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $eleccion->fecha_inicio_elecciones)->format('h:i A') }}
                        </span>
                        -
                        <span>Termina
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $eleccion->fecha_fin_elecciones)->format('h:i A') }}
                        </span>
                    </p>
                </div>

                <div class="contenedor_votar_cuerpo">
                    <!--CONTENEDOR VOTAR CANDIDATOS-->
                    <div class="contenedor_votar_candidatos">
                        <!--BUSCADOR-->
                        <div class="formulario">
                            <div class="contenedor_elemento_item">
                                <p class="estilo_nombre_input">Buscar candidato: <span
                                        class="campo_opcional">(Opcional)</span> </p>
                                <input type="text" wire:model.live="buscarCandidato" placeholder="Buscar...">
                            </div>
                        </div>

                        <!--CONTENEDOR SUBTITULO-->
                        <div class="contenedor_subtitulo_admin">
                            <h3>Lista de candidatos <span> Cantidad: {{ $candidatos->count() }}</span></h3>
                        </div>

                        <div class="contenedor_lista_candidatos">
                            @foreach ($candidatos as $candidato)
                                <label>
                                    <div class="candidato_nombre">
                                        <input type="radio" wire:model.live="candidatoId"
                                            value="{{ $candidato->candidato_id }}">
                                        <p>{{ $candidato->nombres }} {{ $candidato->apellido_paterno }}
                                            {{ $candidato->apellido_materno }}</p>
                                    </div>
                                    <div class="contenedor_numero_imagen">
                                        <div class="candidato_numero">
                                            <p>{{ $candidato->numero_candidato }}</p>
                                        </div>
                                        <div class="candidato_imagen">
                                            @if ($candidato->imagen_perfil_ruta)
                                                <img src="{{ Storage::url($candidato->imagen_perfil_ruta) }}"
                                                    alt="" />
                                            @else
                                                <img src="{{ asset('imagenes/perfil/sin_foto_perfil.png') }}">
                                            @endif
                                        </div>
                                    </div>

                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!--CONTENEDOR VOTAR CANDIDATO SELECCIONADO FIJO-->
                    <div class="contenedor_votar_candidato_seleccionado_fijo">
                        @if ($candidatoId)
                            <div class="candidato_imagen_seleccionado">
                                @if ($candidatoSeleccionado->socio->imagenPerfil)
                                    <img
                                        src="{{ Storage::url($candidatoSeleccionado->socio->imagenPerfil->imagen_perfil_ruta) }}" />
                                @else
                                    <img src="{{ asset('imagenes/perfil/sin_foto_perfil.png') }}">
                                @endif
                            </div>
                            <span style="color: #009b54;">Seleccionaste este candidato</span>
                            <p>{{ $candidatoSeleccionado->socio->nombres }}</p>
                            <button wire:click="votarCandidato({{ $candidatoSeleccionado->id }})">Votar por el
                                {{ $candidatoSeleccionado->numero_candidato }}</button>
                        @else
                            <div class="candidato_imagen_seleccionado">
                                <img src="{{ asset('imagenes/perfil/sin_foto_perfil.png') }}">
                            </div>
                            <span style="color: red;">Te falta seleccionar al candidato</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
