<div class="contenedor_navbar_pie">
    <div class="navbar_pie_menu">
        <a href="#seccion_crd">Inicio</a>
        <a href="#seccion_registrate">¿Cómo votar?</a>
        <a href="{{ asset('documentos/candidatos.pdf') }}" target="_blank" class="boton_menu_principal">Candidatos</a>
        @if (!Auth::check())
            <a href="{{ route('ingresar.socio') }}" class="boton_menu_principal">Ingresar</a>
        @else
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <a href="{{ route('logout') }}" @click.prevent="$root.submit();">
                    {{ __('Cerrar') }}
                </a>
            </form>
        @endif
    </div>
</div>

<script>
    // Intercepta los clics en los enlaces del menú
    document.querySelectorAll('.navbar_pie_menu a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault(); // Previene la acción por defecto del enlace
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth' // Desplazamiento suave
            });
        });
    });
</script>
