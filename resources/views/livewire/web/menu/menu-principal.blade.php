<header class="contenedor_navbar">
    <!-- GRID MENU -->
    <nav class="navbar" x-data="sidebar" x-on:click.away="cerrarSidebar()">
        <!-- MENU -->
        <div class="contenedor_menu">
            <!-- LOGO -->
            <div class="contenedor_logo">
                <a href="{{ route('inicio') }}">
                    <img src="{{ asset('imagenes/empresa/logo.png') }}" alt="" />
                </a>
            </div>
            <!-- LINKS -->
            <div class="contenedor_menu_link" :class="{ 'block': abiertoSidebar, 'block': !abiertoSidebar }">
                <!-- SIDEBAR LOGO -->
                <div class="sidebar_logo">
                    <img src="{{ asset('imagenes/empresa/logo.png') }}" alt="" />
                    <i x-on:click="cerrarSidebar" style="cursor: pointer; color: #666666;"
                        class="fa-solid fa-xmark"></i>
                </div>
                @include('web.menu.menu-pie')
            </div>
            <!-- HAMBURGUESA -->
            <div x-on:click="abrirSidebar" class="contenedor_hamburguesa">
                <i class="fa-solid fa-bars" style="color: #666666;"></i>
            </div>
        </div>
    </nav>
</header>

@push('script')
    <script>
        function sidebar() {
            return {
                abiertoSidebar: false,
                toggleSidebar() {
                    this.abiertoSidebar = !this.abiertoSidebar
                },
                abrirSidebar() {
                    if (this.abiertoSidebar) {
                        this.abiertoSidebar = false;
                        document.querySelector(".contenedor_menu_link").style.left = "-100%";
                    } else {
                        this.abiertoSidebar = true;
                        document.querySelector(".contenedor_menu_link").style.left = "0";
                    }
                },
                cerrarSidebar() {
                    this.abiertoSidebar = false;
                    document.querySelector(".contenedor_menu_link").style.left = "-100%";
                }
            }
        }
    </script>
@endpush
