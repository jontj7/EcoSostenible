<footer class="bg-green-100 text-green-900 pt-12 pb-6">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Logo + Descripción -->
        <div>
            <div class="flex items-center space-x-2 mb-4">
                <img src="{{ asset('images/eco.png') }}" alt="Logo EcoSostenible" class="h-12 w-12 rounded-full shadow">
                <span class="text-xl font-semibold">EcoSostenible</span>
            </div>
            <p class="text-sm">
                EcoSostenible es una iniciativa educativa para promover hábitos responsables con el medio ambiente.
            </p>

            @auth
                @php
                    $avatar = Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('images/ecoUser.png');
                @endphp
                <div class="mt-4 flex items-center gap-3">
                    <img src="{{ $avatar }}" alt="Avatar" class="w-8 h-8 rounded-full border border-green-400 shadow">
                    <span class="text-green-800 font-medium text-sm">{{ Auth::user()->name }}</span>
                </div>
            @endauth
        </div>

        <!-- Navegación -->
        <div>
            <h4 class="text-lg font-semibold mb-4">Navegación</h4>
            <ul class="space-y-2">
                <li><a href="{{ route('inicio') }}" class="hover:text-green-600 flex items-center gap-2"><i data-lucide="home" class="w-4 h-4"></i>Inicio</a></li>
                <li><a href="{{ route('reciclaje') }}" class="hover:text-green-600 flex items-center gap-2"><i data-lucide="recycle" class="w-4 h-4"></i>Reciclaje</a></li>
                <li><a href="{{ route('consumo') }}" class="hover:text-green-600 flex items-center gap-2"><i data-lucide="leaf" class="w-4 h-4"></i>Consumo Responsable</a></li>
                <li><a href="{{ route('foro') }}" class="hover:text-green-600 flex items-center gap-2"><i data-lucide="users" class="w-4 h-4"></i>Foro Comunitario</a></li>

                @guest
                    <li><a href="{{ route('auth') }}" class="hover:text-green-600 flex items-center gap-2"><i data-lucide="log-in" class="w-4 h-4"></i>Iniciar Sesión</a></li>
                @endguest

                @auth
                    <li><a href="{{ route('perfil') }}" class="hover:text-green-600 flex items-center gap-2"><i data-lucide="user" class="w-4 h-4"></i>Perfil</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" onsubmit="return confirmLogout()">
                            @csrf
                            <button type="submit" class="hover:text-red-600 flex items-center gap-2 text-left">
                                <i data-lucide="log-out" class="w-4 h-4"></i> Cerrar sesión
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>

        <!-- Contacto + Redes -->
        <div>
            <h4 class="text-lg font-semibold mb-4">Contáctanos</h4>
            <ul class="space-y-2 text-sm">
                <li class="flex items-center gap-2"><i data-lucide="mail" class="w-4 h-4"></i>correo@ecosostenible.com</li>
                <li class="flex items-center gap-2"><i data-lucide="map-pin" class="w-4 h-4"></i>San Salvador, El Salvador</li>
            </ul>
            <div class="flex items-center space-x-4 mt-4">
                <a href="#" class="hover:text-green-600" aria-label="Facebook"><i data-lucide="facebook" class="w-5 h-5"></i></a>
                <a href="#" class="hover:text-green-600" aria-label="Instagram"><i data-lucide="instagram" class="w-5 h-5"></i></a>
                <a href="#" class="hover:text-green-600" aria-label="Twitter"><i data-lucide="twitter" class="w-5 h-5"></i></a>
                <a href="#" class="hover:text-green-600" aria-label="Telegram"><i data-lucide="send" class="w-5 h-5"></i></a>
            </div>
        </div>
    </div>

    <div class="text-center text-sm mt-8 text-green-700">
        &copy; {{ date('Y') }} EcoSostenible. Todos los derechos reservados.
    </div>
</footer>

<!-- Lucide icons + logout confirmación -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        lucide.createIcons();
    });

    function confirmLogout() {
        return confirm("¿Estás seguro de que deseas cerrar sesión?");
    }
</script>
