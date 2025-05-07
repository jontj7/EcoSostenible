@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-r from-green-200 to-cyan-200 pt-[120px] pb-20" id="desafios">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        <!-- Título -->
        <h2 class="text-3xl sm:text-4xl font-semibold text-green-900 mb-4 animate__animated animate__fadeInUp">
            🌱 Únete a los Desafíos
        </h2>
        <p class="text-lg text-green-800 mb-10 animate__animated animate__fadeInUp animate__delay-1s">
            Participa cada mes en acciones sostenibles y reta a tus amigos a reducir su impacto ambiental.
        </p>

        <!-- Tarjetas de desafíos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 animate__animated animate__fadeInLeft animate__delay-2s">
                <img src="{{ asset('images/desafio1.png') }}" alt="Desafío 1" class="w-full h-40 object-cover rounded-md mb-4">
                <h3 class="text-xl font-bold text-green-900 mb-2">Desafío de Plásticos</h3>
                <p class="text-sm text-green-700">Evita plásticos de un solo uso durante 7 días. ¡Sube tu progreso!</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 animate__animated animate__fadeInUp animate__delay-3s">
                <img src="{{ asset('images/desafio2.png') }}" alt="Desafío 2" class="w-full h-40 object-cover rounded-md mb-4">
                <h3 class="text-xl font-bold text-green-900 mb-2">Transporte Sostenible</h3>
                <p class="text-sm text-green-700">Camina, usa bici o transporte público durante una semana.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 animate__animated animate__fadeInRight animate__delay-4s">
                <img src="{{ asset('images/desafio3.png') }}" alt="Desafío 3" class="w-full h-40 object-cover rounded-md mb-4">
                <h3 class="text-xl font-bold text-green-900 mb-2">Reducir el Desperdicio</h3>
                <p class="text-sm text-green-700">Lleva un registro de tus residuos orgánicos durante 5 días.</p>
            </div>
        </div>

        <!-- Botón -->
        <div class="animate__animated animate__fadeInUp animate__delay-5s">
            <a href="#" class="bg-green-700 text-white py-3 px-6 rounded-full text-lg font-semibold shadow-lg hover:bg-green-800 transition duration-300">
                Participar en un Desafío
            </a>
        </div>
    </div>
</section>
@endsection
