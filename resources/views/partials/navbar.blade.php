<header class="sticky top-0 z-50">
  <nav id="navbar" class="bg-white shadow-md rounded-full mx-4 mt-4 px-4 py-2 flex items-center justify-between transition duration-300 ease-in-out">
    <!-- Logo -->
    <div class="flex items-center space-x-2">
      <a href="{{ route('inicio') }}">
        <img src="{{ asset('images/eco.png') }}" alt="Logo EcoSostenible" class="max-w-[48px] sm:max-w-[60px] w-auto h-auto rounded-full shadow transition-all duration-300">
      </a>
    </div>

    <!-- Menú escritorio -->
    <div class="hidden md:flex items-center space-x-6 text-green-900 font-medium">
      @php
        $menuLinks = [
          ['route' => 'inicio', 'icon' => 'home', 'label' => 'Inicio'],
          ['route' => 'reciclaje', 'icon' => 'recycle', 'label' => 'Reciclaje'],
          ['route' => 'reduccion', 'icon' => 'trash-2', 'label' => 'Reducción de Residuos'],
          ['route' => 'consumo', 'icon' => 'shopping-bag', 'label' => 'Consumo Responsable'],
          ['route' => 'desafio', 'icon' => 'target', 'label' => 'Desafíos Ecológicos'],
          ['route' => 'consejo', 'icon' => 'lightbulb', 'label' => 'Consejos Rápidos'],
          ['route' => 'foro', 'icon' => 'users', 'label' => 'Foro Comunitario'],
        ];

        $avatar = Auth::check() && Auth::user()->avatar
                  ? asset(Auth::user()->avatar)
                  : asset('images/ecoUser.png');
      @endphp

      @foreach ($menuLinks as $link)
        <a href="{{ route($link['route']) }}" class="flex items-center gap-2 hover:text-green-600 transition {{ request()->routeIs($link['route']) ? 'font-bold' : '' }}">
          <i data-lucide="{{ $link['icon'] }}" class="w-5 h-5"></i> {{ $link['label'] }}
        </a>
      @endforeach

      @auth
        <!-- Dropdown controlado por JS -->
        <div class="relative" id="user-dropdown">
          <div id="user-trigger" class="flex items-center gap-2 cursor-pointer">
            <img src="{{ $avatar }}" alt="Avatar" class="w-8 h-8 rounded-full border border-green-400 shadow">
            <span class="text-green-800 text-sm">{{ Auth::user()->name }}</span>
          </div>

          <div id="user-menu" class="absolute top-10 right-0 w-52 bg-white rounded-md shadow-md opacity-0 scale-95 pointer-events-none transition-all duration-200 z-50">
            <a href="{{ route('perfil') }}" class="block px-4 py-2 text-green-700 hover:bg-green-100 flex items-center gap-2">
              <i data-lucide="user" class="w-4 h-4"></i> Perfil
            </a>
            
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-100 flex items-center gap-2">
                <i data-lucide="log-out" class="w-4 h-4"></i> Cerrar sesión
              </button>
            </form>
          </div>
        </div>
      @else
        <a href="{{ route('auth') }}" class="flex items-center gap-2 hover:text-green-600 transition">
          <i data-lucide="user-circle" class="w-5 h-5"></i> Iniciar Sesión
        </a>
      @endauth
    </div>

    <!-- Menú móvil -->
    <div class="md:hidden flex items-center space-x-4">
      @auth
        <a href="{{ route('perfil') }}">
          <img src="{{ $avatar }}" alt="Avatar" class="w-7 h-7 rounded-full border border-green-400 shadow">
        </a>
      @else
        <a href="{{ route('auth') }}" class="text-green-800 hover:text-green-600">
          <i data-lucide="user-circle" class="w-6 h-6"></i>
        </a>
      @endauth
      <button id="menu-toggle" class="text-green-800 focus:outline-none relative w-7 h-7 z-50">
        <i id="icon-menu" data-lucide="menu" class="absolute inset-0 w-7 h-7 transition-opacity duration-200 opacity-100"></i>
        <i id="icon-close" data-lucide="x" class="absolute inset-0 w-7 h-7 transition-opacity duration-200 opacity-0"></i>
      </button>
    </div>
  </nav>

  <!-- Menú móvil -->
  <div id="mobile-menu" class="md:hidden hidden absolute top-[80px] left-0 w-full bg-white py-4 px-6 space-y-3 shadow transition-all duration-300 ease-in-out z-40 opacity-0 scale-95 pointer-events-none rounded-md">
    @foreach ($menuLinks as $link)
      <a href="{{ route($link['route']) }}" class="mobile-link block text-green-900 font-medium hover:text-green-600 flex items-center gap-2">
        <i data-lucide="{{ $link['icon'] }}" class="w-5 h-5"></i> {{ $link['label'] }}
      </a>
    @endforeach
    @auth
      <div class="flex items-center gap-2 mt-4 text-green-800">
        <img src="{{ $avatar }}" alt="Avatar" class="w-8 h-8 rounded-full border border-green-400 shadow">
        <span>{{ Auth::user()->name }}</span>
      </div>
      <a href="{{ route('perfil') }}" class="block text-green-700 hover:text-green-900 px-2 py-1 flex items-center gap-2">
        <i data-lucide="user" class="w-4 h-4"></i> Perfil
      </a>
      
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full text-left px-2 py-1 text-red-600 hover:text-red-800 flex items-center gap-2">
          <i data-lucide="log-out" class="w-4 h-4"></i> Cerrar sesión
        </button>
      </form>
    @endauth
  </div>
</header>

<!-- Script funcional -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    lucide.createIcons();

    const toggleBtn = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const iconMenu = document.getElementById('icon-menu');
    const iconClose = document.getElementById('icon-close');

    const toggleMenu = (show) => {
      if (show) {
        mobileMenu.classList.remove('hidden');
        setTimeout(() => {
          mobileMenu.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
          mobileMenu.classList.add('opacity-100', 'scale-100', 'pointer-events-auto');
        }, 10);
        iconMenu.classList.add('opacity-0');
        iconClose.classList.remove('opacity-0');
        iconClose.classList.add('opacity-100');
      } else {
        mobileMenu.classList.remove('opacity-100', 'scale-100', 'pointer-events-auto');
        mobileMenu.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
        iconMenu.classList.remove('opacity-0');
        iconClose.classList.remove('opacity-100');
        iconClose.classList.add('opacity-0');
        setTimeout(() => {
          mobileMenu.classList.add('hidden');
        }, 300);
      }
    };

    toggleBtn.addEventListener('click', () => {
      toggleMenu(mobileMenu.classList.contains('hidden'));
    });

    document.querySelectorAll('.mobile-link').forEach(link => {
      link.addEventListener('click', () => toggleMenu(false));
    });

    document.addEventListener('click', (event) => {
      const isClickInside = mobileMenu.contains(event.target) || toggleBtn.contains(event.target);
      if (!isClickInside && !mobileMenu.classList.contains('hidden')) {
        toggleMenu(false);
      }
    });

    // Dropdown usuario escritorio
    const userTrigger = document.getElementById('user-trigger');
    const userMenu = document.getElementById('user-menu');

    if (userTrigger && userMenu) {
      let timeout;

      userTrigger.addEventListener('mouseenter', () => {
        clearTimeout(timeout);
        userMenu.classList.add('opacity-100', 'pointer-events-auto', 'scale-100');
        userMenu.classList.remove('opacity-0', 'pointer-events-none', 'scale-95');
      });

      userTrigger.addEventListener('mouseleave', () => {
        timeout = setTimeout(() => {
          userMenu.classList.remove('opacity-100', 'pointer-events-auto', 'scale-100');
          userMenu.classList.add('opacity-0', 'pointer-events-none', 'scale-95');
        }, 200);
      });

      userMenu.addEventListener('mouseenter', () => clearTimeout(timeout));
      userMenu.addEventListener('mouseleave', () => {
        timeout = setTimeout(() => {
          userMenu.classList.remove('opacity-100', 'pointer-events-auto', 'scale-100');
          userMenu.classList.add('opacity-0', 'pointer-events-none', 'scale-95');
        }, 200);
      });
    }
  });
</script>
