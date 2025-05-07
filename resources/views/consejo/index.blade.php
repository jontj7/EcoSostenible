@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-r from-green-200 to-cyan-200 pt-[100px] pb-20 overflow-hidden" id="consejos">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

    <!-- Animación central manos + eco -->
    <div class="relative flex justify-center items-center flex-col sm:flex-row h-[420px] sm:h-[480px] md:h-[520px] mb-16 overflow-hidden gap-4 sm:gap-0" id="animacion-manos">
      <!-- Mano izquierda -->
      <img id="mano-izquierda" src="{{ asset('images/izquierda.png') }}" alt="Mano Izquierda"
        class="absolute sm:static left-[6%] w-[160px] sm:w-[270px] md:w-[300px] opacity-0 -translate-x-[100%] transition-all duration-[1500ms] ease-out">

      <!-- Logo Eco + texto -->
      <div class="z-10 flex flex-col items-center opacity-0 scale-0 transition-all duration-[1500ms] ease-out" id="eco-logo">
        <img src="{{ asset('images/ecoenmedio.png') }}" alt="Logo EcoSostenible"
          class="w-[120px] sm:w-[170px] md:w-[210px] mb-3 sm:mb-2">
        <p class="text-green-900 font-semibold text-sm sm:text-lg md:text-xl px-4 text-center leading-snug">
          Nuestra conexión con el planeta empieza contigo.
        </p>
      </div>

      <!-- Mano derecha -->
      <img id="mano-derecha" src="{{ asset('images/derecha.png') }}" alt="Mano Derecha"
        class="absolute sm:static right-[6%] w-[160px] sm:w-[270px] md:w-[300px] opacity-0 translate-x-[100%] transition-all duration-[1500ms] ease-out">
    </div>

    <!-- Título -->
    <h2 class="text-3xl sm:text-4xl font-bold text-green-900 mb-4" data-aos="fade-up">
      🌱 <span class="text-pink-500">Consejos Rápidos</span>
    </h2>
    <p class="text-lg text-green-800 mb-12" data-aos="fade-up" data-aos-delay="200">
      Acciones pequeñas, grandes cambios. Comparte consejos sostenibles con tu comunidad.
    </p>

    <!-- Tarjetas de consejos -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
      @foreach ([
        'Apaga las luces que no uses.',
        'Lleva tu bolsa reutilizable.',
        'Prefiere productos locales.',
        'Reduce el uso del agua.',
        'Reutiliza envases y frascos.',
        'Compra a granel para evitar plásticos.'
      ] as $index => $consejo)
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition transform hover:scale-105"
             data-aos="zoom-in" data-aos-delay="{{ 100 * $index }}">
          <p class="text-green-800 text-lg font-semibold mb-4">
            ✅ {{ $consejo }}
          </p>
          <button class="bg-green-700 text-white py-2 px-4 rounded-full text-sm hover:bg-green-800 transition">
            Compartir
          </button>
        </div>
      @endforeach
    </div>
  </div>

  <!-- Animación scroll script -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const izquierda = document.getElementById("mano-izquierda");
      const derecha = document.getElementById("mano-derecha");
      const eco = document.getElementById("eco-logo");
      const trigger = document.getElementById("animacion-manos");

      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            eco.classList.remove("opacity-0", "scale-0");
            eco.classList.add("opacity-100", "scale-100");

            izquierda.classList.remove("opacity-0", "-translate-x-[100%]");
            izquierda.classList.add("opacity-100", "translate-x-0");

            derecha.classList.remove("opacity-0", "translate-x-[100%]");
            derecha.classList.add("opacity-100", "translate-x-0");
          }
        });
      }, { threshold: 0.5 });

      observer.observe(trigger);
    });
  </script>
</section>
@endsection
