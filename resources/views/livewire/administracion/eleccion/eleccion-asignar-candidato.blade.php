@section('tituloPagina', 'Asignar candidato')

<div>
    <!--CONTENEDOR CABECERA-->
    <div class="contenedor_administrador_cabecera">
        <!--CONTENEDOR TITULO-->
        <div class="contenedor_titulo_admin">
            <h2>Asignar candidato</h2>
        </div>
        <!--CONTENEDOR BOTONES-->
        <div class="contenedor_botones_admin">
            <a href="{{ route('administracion.eleccion.vista.todas') }}">
                <i class="fa-solid fa-arrow-left-long"></i> Regresar</a>
        </div>
    </div>

    <!--CONTENEDOR PÁGINA ADMINISTRADOR-->
    <div class="contenedor_administrador_contenido">
        <div class="grid_asignar_candidato">
            <div class="contenedor_panel_producto_admin grid_item_candidato_formulario">
                <!--CONTENEDOR SUBTITULO-->
                <div class="contenedor_subtitulo_admin">
                    <h3>Formulario</h3>
                </div>

                <div class="formulario">
                    <!--NUMERO-->
                    <div class="contenedor_1_elementos_100">
                        <!--NUMERO-->
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Número candidato: <span
                                    class="campo_obligatorio">(Obligatorio)</span>
                            </p>
                            <input type="text" wire:model="numero" required>
                            @error('numero')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!--ENVIAR-->
                    <div class="contenedor_1_elementos_100">
                        <button wire:click="asignarCandidato">Enviar</button>
                    </div>
                </div>

                <br>
                @if ($socios->count())
                    <!--CONTENEDOR SOCIOS-->
                    <div class="contenedor_votar_candidatos">
                        <!--BUSCADOR-->
                        <div class="formulario">
                            <div class="contenedor_elemento_item">
                                <p class="estilo_nombre_input">Buscar socio: <span
                                        class="campo_opcional">(Opcional)</span>
                                </p>
                                <input type="text" wire:model.live="buscarSocio" placeholder="Buscar...">
                            </div>
                        </div>

                        <!--CONTENEDOR SUBTITULO-->
                        <div class="contenedor_subtitulo_admin">
                            <h3>Socios <span> Cantidad: {{ $socios->count() }}</span></h3>
                        </div>

                        <div class="contenedor_lista_candidatos_asignar">
                            @foreach ($socios as $socio)
                                <label
                                    style="{{ $socioIdSeleccionado == $socio->id ? 'color: #009b54; font-weight: 600;' : '' }}">
                                    <div class="candidato_nombre">
                                        <p><input type="radio" name="socio_seleccionado" value="{{ $socio->id }}"
                                                wire:model.live="socioIdSeleccionado"> {{ $socio->nombres }}
                                            {{ $socio->apellido_paterno }}
                                            {{ $socio->apellido_materno }}</p>
                                    </div>
                                </label>
                            @endforeach
                        </div>

                        <br>
                        @if ($socios->hasPages())
                            <div>
                                {{ $socios->links('pagination::tailwind') }}
                            </div>
                        @endif
                    </div>
                @else
                    <div class="contenedor_no_existe_elementos">
                        <p>No hay socios.</p>
                        <i class="fa-solid fa-spinner"></i>
                    </div>
                @endif
            </div>

            <div class="contenedor_panel_producto_admin grid_item_lista_candidato">
                <!--CONTENEDOR VOTAR-->
                <div class="contenedor_votar">
                    <div class="contenedor_votar_titulo">
                        <h3>{{ $eleccion->nombre }}</h3>

                        <p> Intervalo de fecha para asignar candidatos:
                            <span>
                                {{ $eleccion->fecha_inicio_convocatoria }}
                            </span>
                            -
                            <span>
                                {{ $eleccion->fecha_fin_convocatoria }}
                            </span>
                        </p>

                        <p> <span> Día elección:
                                {{ $eleccion->fecha_inicio_elecciones }}
                            </span></p>
                    </div>

                    <div class="contenedor_votar_cuerpo">

                        @if ($candidatos->count())
                            <!--CONTENEDOR CANDIDATOS-->
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

                                <div class="contenedor_lista_candidatos_asignar">
                                    @foreach ($candidatos as $candidato)
                                        <label>
                                            <div class="candidato_nombre">
                                                <p>{{ $candidato->numero_candidato }} - {{ $candidato->nombres }} {{ $candidato->apellido_paterno }}
                                                    {{ $candidato->apellido_materno }}</p>
                                                <button class="quitar"
                                                    wire:click="$dispatch('quitarCandidatoAlerta', { socioId: {{ $candidato->socio_id }} })">Quitar</button>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="contenedor_no_existe_elementos">
                                <p>No hay candidatos.</p>
                                <i class="fa-solid fa-spinner"></i>
                            </div>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@script
    <script>
        Livewire.on('quitarCandidatoAlerta', (socioId) => {
            Swal.fire({
                title: '¿Quieres quitar?',
                text: "No podrás recuparlo.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('quitarCandidato', {
                        socioId: socioId
                    });
                }
            })
        })
    </script>
@endscript
