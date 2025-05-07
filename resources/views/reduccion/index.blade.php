@extends('layouts.app')

@section('content')

<section id="residuos" class="relative bg-white py-24 px-4 sm:px-6 lg:px-8 overflow-hidden">

    <!-- Íconos decorativos flotantes -->
    <div class="absolute top-0 left-0 w-full h-full z-0 pointer-events-none">
        <div class="absolute top-10 left-10 w-3 h-3 bg-green-200 rounded-full animate-ping"></div>
        <div class="absolute bottom-20 right-10 w-4 h-4 bg-cyan-300 rounded-full animate-bounce"></div>
    </div>

    <!-- Contenido principal -->
    <div class="relative z-10 max-w-6xl mx-auto text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-green-900 mb-6 animate__animated animate__fadeInUp">
            Reducción de Residuos
        </h2>
        <p class="text-green-800 text-base sm:text-lg mb-12 animate__animated animate__fadeInUp animate__delay-1s">
            Reducir los residuos que generamos es uno de los pasos más efectivos para proteger el medio ambiente.
            <br class="hidden sm:inline"> Adoptar hábitos sostenibles comienza con pequeñas acciones diarias.
        </p>

        <!-- Tarjetas con imagen y tips -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
            <!-- Tarjeta 1 -->
            <div class="bg-green-50 p-6 rounded-lg shadow-md hover:scale-105 transition duration-300 animate__animated animate__fadeInLeft">
                <img src="{{ asset('images/bolsa-reutilizable.jpg') }}" alt="Bolsa reutilizable" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold text-green-900 mb-2">Usa bolsas reutilizables</h3>
                <p class="text-green-700 text-sm">Evita las bolsas plásticas de un solo uso al hacer tus compras.</p>
            </div>

            <!-- Tarjeta 2 -->
            <div class="bg-green-50 p-6 rounded-lg shadow-md hover:scale-105 transition duration-300 animate__animated animate__fadeInUp animate__delay-1s">
                <img src="{{ asset('images/termo.jpg') }}" alt="Termo reutilizable" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold text-green-900 mb-2">Lleva tu taza o termo</h3>
                <p class="text-green-700 text-sm">Reduce el consumo de vasos desechables llevando tus propios envases.</p>
            </div>

            <!-- Tarjeta 3 -->
            <div class="bg-green-50 p-6 rounded-lg shadow-md hover:scale-105 transition duration-300 animate__animated animate__fadeInRight animate__delay-2s">
                <img src="{{ asset('images/utensilios-reutilizables.jpg') }}" alt="Utensilios reutilizables" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold text-green-900 mb-2">Evita utensilios desechables</h3>
                <p class="text-green-700 text-sm">Usa cubiertos y platos reutilizables en tus comidas diarias.</p>
            </div>
        </div>

        <!-- Datos impactantes -->
        <div class="bg-green-100 p-8 rounded-lg shadow-md mb-16 max-w-3xl mx-auto animate__animated animate__fadeInUp animate__delay-3s">
            <h4 class="text-green-900 font-semibold text-lg mb-3">¿Sabías que…?</h4>
            <p class="text-green-700 text-sm">Cada persona genera en promedio <strong>1 kg de basura al día</strong>. Al reducir tu consumo innecesario puedes disminuir más del <strong>40% de tus residuos mensuales</strong>. ¡Imagina el impacto si todos lo hiciéramos! 🌱</p>
        </div>

        <!-- Botón de acción -->
        <div class="animate__animated animate__fadeInUp animate__delay-4s">
            <a href="{{ route('consumo') }}"
               class="bg-green-700 text-white py-3 px-6 rounded-full text-lg font-semibold shadow-lg hover:bg-green-800 transition duration-300 inline-flex items-center gap-2">
                <i class="fas fa-leaf animate__animated animate__pulse animate__infinite"></i> Aprende a consumir mejor
            </a>
        </div>
    </div>
</section>

@endsection
