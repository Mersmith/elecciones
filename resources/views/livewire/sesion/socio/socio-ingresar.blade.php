@section('tituloPagina', 'Ingresar')
<div>
    <!--GRID CONTENEDOR LOGIN-->
    <div class="contenedor_login">
        <!--GRID LOGIN IMAGEN-->
        <div class="contenedor_login_imagen">
            <!--IMAGEN-->
            <img src="{{ asset('imagenes/sesion/1.jpg') }}" alt="" />
            <!--TEXTO-->
            <div>
                <h2>“Alguien luchó por tu derecho al voto. Úsalo”.</h2>
                <h3>Susan B. Anthony</h3>
                <p>Activista</p>
            </div>
        </div>

        <!--GRID LOGIN FORMULARIO-->
        <div class="contenedor_login_formulario">
            <!--FORMULARIO CENTRAR-->
            <div class="login_formulario_centrar">

                <!--LOGO-->
                <div class="login_formulario_logo">
                    <a href="{{ route('inicio') }}">
                        <img src="{{ asset('imagenes/empresa/logo.png') }}" alt="" />
                    </a>
                </div>

                <!--TITULO-->
                <h1 class="titulo_formulario">¡HOLA! BIENVENIDO DE NUEVO </h1>

                <!--PÁRRAFO-->
                <p class="descripcion_formulario">Inicie sesión con sus datos de socio.</p>

                <!--FORMULARIO-->
                <form wire:submit.prevent="ingresar" class="formulario" style="width: 100%; margin-top: 30px;">
                    <!--EMAIL-->
                    <div class="contenedor_1_elementos_100">
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Dni:</p>
                            <input type="text" id="email" wire:model="email" autofocus>
                            @error('email')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!--CONTRASEÑA-->
                    <div class="contenedor_1_elementos_100">
                        <div class="contenedor_elemento_item">
                            <p class="estilo_nombre_input">Año de nacimiento:</p>
                            <input type="password" id="password" wire:model="password">
                            @error('password')
                                <span class="campo_obligatorio">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="contenedor_1_elementos_100">
                        <div class="contenedor_elemento_item">
                            <label for="recordarme" class="estilo_nombre_input">
                                <input type="checkbox" wire:model="recordarme" name="recordarme" id="recordarme" />
                                Recordarme
                            </label>
                        </div>
                    </div>

                    <!--ENVIAR-->
                    <div class="contenedor_1_elementos_100">
                        <div class="contenedor_elemento_item">
                            <input type="submit" value="Ingresar" wire:loading.attr="disabled" wire:target="ingresar">
                            <span wire:loading wire:target="ingresar">
                                <x-spinner wire:target="ingresar" />
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
