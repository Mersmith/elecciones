@section('tituloPagina', 'Crear Usuario')
<div>
    <!--CONTENEDOR CABECERA-->
    <div class="contenedor_administrador_cabecera">
        <!--CONTENEDOR TITULO-->
        <div class="contenedor_titulo_admin">
            <h2>Crear usuario</h2>
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

            <div class="formulario">
                <!--NOMBRE Y EMAIL-->
                <div class="contenedor_2_elementos">
                    <!--NOMBRE-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Nombre: <span class="campo_obligatorio">(Obligatorio)</span></p>
                        <input type="text" wire:model="nombre" required>
                        @error('nombre')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>

                    <!--EMAIL-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Email: <span class="campo_obligatorio">(Obligatorio)</span></p>
                        <input type="email" wire:model="email" required>
                        @error('email')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!--DNI Y CONTRASEÑA-->
                <div class="contenedor_2_elementos">
                    <!--DNI-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">DNI: <span class="campo_obligatorio">(Obligatorio)</span>
                        </p>
                        <input type="text" wire:model="dni" required>
                        @error('codigo')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>

                    <!--CONTRASEÑA-->
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Contraseña: <span class="campo_obligatorio">(Obligatorio)</span>
                        </p>
                        <input type="password" wire:model="password" required>
                        @error('password')
                            <span class="campo_obligatorio">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!--ROL-->
                <div class="contenedor_1_elementos_100">
                    <div class="contenedor_elemento_item">
                        <p class="estilo_nombre_input">Roles: <span class="campo_obligatorio">(Obligatorio)</span></p>
                        @foreach ($roles as $rol)
                            <label for="">
                                {{ $rol->nombre }}
                                <input type="checkbox" name="roles[]" value="{{ $rol->id }}"
                                    wire:model.live="roles_elegidos">
                            </label>
                        @endforeach
                    </div>
                </div>

                @if (in_array(2, $roles_elegidos))
                    <!--APELLIDO PATERNO Y APELLIDO MATERNO-->
                    <div class="contenedor_2_elementos">
                        <!--APELLIDO PATERNO-->
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Apellido paterno: <span
                                    class="campo_obligatorio">(Obligatorio)</span>
                            </p>
                            <input type="text" wire:model="apellido_paterno" required>
                            @error('apellido_paterno')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>

                        <!--APELLIDO MATERNO-->
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Apellido materno: <span
                                    class="campo_obligatorio">(Obligatorio)</span>
                            </p>
                            <input type="text" wire:model="apellido_materno" required>
                            @error('apellido_materno')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!--CODIGO SOCIO Y CELULAR-->
                    <div class="contenedor_2_elementos">
                        <!--CODIGO SOCIO-->
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Código socio: <span
                                    class="campo_obligatorio">(Obligatorio)</span>
                            </p>
                            <input type="text" wire:model="codigo" required>
                            @error('codigo')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>

                        <!--CELULAR-->
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Celular: <span class="campo_obligatorio">(Obligatorio)</span>
                            </p>
                            <input type="text" wire:model="celular" required>
                            @error('celular')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!--FECHA NACIMIENTO Y SEXO-->
                    <div class="contenedor_2_elementos">
                        <!--FECHA NACIMIENTO-->
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Fecha nacimiento: <span
                                    class="campo_obligatorio">(Obligatorio)</span>
                            </p>
                            <input type="date" wire:model="fecha_nacimiento" required>
                            @error('fecha_nacimiento')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>

                        <!--SEXO-->
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Sexo: <span class="campo_obligatorio">(Obligatorio)</span>
                            </p>
                            <div>
                                <label>
                                    <input type="radio" wire:model="sexo" value="M">
                                    Hombre
                                </label>
                                <label>
                                    <input type="radio" wire:model="sexo" value="F">
                                    Mujer
                                </label>
                            </div>
                            @error('sexo')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!--CONDICION Y GRADO-->
                    <div class="contenedor_2_elementos">
                        <!--CONDICION-->
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Condición: <span
                                    class="campo_obligatorio">(Obligatorio)</span>
                            </p>
                            <select wire:model="condicion">
                                <option value="" disabled>Seleccione</option>
                                <option value="INHABILITADO">INHABILITADO</option>
                                <option value="HABILITADO">HABILITADO</option>
                            </select>
                            @error('condicion')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>

                        <!--GRADO-->
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Grado: <span class="campo_obligatorio">(Obligatorio)</span>
                            </p>
                            <select wire:model="grado">
                                <option value="" disabled>Seleccione</option>
                                <option value="PRIMARIA">PRIMARIA</option>
                                <option value="SECUNDARIA">SECUNDARIA</option>
                                <option value="SUPERIOR">SUPERIOR</option>
                                <option value="ILETRADO">ILETRADO</option>
                                <option value="TECNICA">TECNICA</option>
                            </select>
                            @error('grado')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!--DIRECCION-->
                    <div class="contenedor_1_elementos_100">
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Dirección: <span
                                    class="campo_obligatorio">(Obligatorio)</span>
                            </p>
                            <textarea rows="2" wire:model="direccion"></textarea>
                            @error('direccion')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!--IMAGEN-->
                    <div class="contenedor_1_elementos_100">
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Imagen: <span class="campo_opcional">(Opcional)</span>
                            </p>
                            <div class="contenedor_subir_imagen_sola contenedor_subir_imagen_sola_estilo_2">
                                @if ($editarImagen)
                                    <img src="{{ $editarImagen->temporaryUrl() }}">
                                    <span class="boton_imagen_eliminar" wire:click="$set('editarImagen', null)">
                                        <i class="fa-solid fa-xmark"></i>
                                    </span>
                                @else
                                    <img src="{{ asset('imagenes/perfil/sin_foto_perfil.png') }}">
                                @endif

                                <div class="opcion_cambiar_imagen">
                                    <label for="imagen">
                                        <div style="cursor: pointer;">
                                            Editar <i class="fa-solid fa-camera"></i>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <input type="file" wire:model="editarImagen" style="display: none" id="imagen">
                            @error('editarImagen')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endif

                <!--ENVIAR-->
                <div class="contenedor_1_elementos">
                    <button wire:click="enviar">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</div>
