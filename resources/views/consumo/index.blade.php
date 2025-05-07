@extends('layouts.app')

@section('content')

<section class="bg-gradient-to-r from-green-200 to-cyan-200 py-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

        <!-- Título principal -->
        <h2 class="text-3xl sm:text-4xl font-bold text-green-900 mb-6 animate__animated animate__fadeInUp">
            Consume con Responsabilidad
        </h2>
        <p class="text-lg text-green-800 mb-12 animate__animated animate__fadeInUp animate__delay-1s">
            Aprende a tomar decisiones sostenibles que protejan el planeta en cada compra que realizas.
        </p>

        <!-- Tarjetas de contenido -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
            <!-- Compras sostenibles -->
            <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition animate__animated animate__fadeInLeft animate__delay-2s">
                <img src="{{ asset('images/compra_sostenible.jpg') }}" alt="Guía compras sostenibles" class="w-full h-44 object-contain mb-4">
                <span class="inline-block bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full mb-2">Guía</span>
                <h3 class="text-xl font-semibold text-green-900 mb-2">Guía de Compras Sostenibles</h3>
                <p class="text-sm text-green-700">Descubre cómo elegir productos respetuosos con el medio ambiente y éticos.</p>
            </div>

            <!-- Comparador -->
            <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition animate__animated animate__fadeInUp animate__delay-3s">
                <img src="{{ asset('images/comparador_productos.jpg') }}" alt="Comparador de productos" class="w-full h-44 object-contain mb-4">
                <span class="inline-block bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full mb-2">Herramienta</span>
                <h3 class="text-xl font-semibold text-green-900 mb-2">Comparador de Productos</h3>
                <p class="text-sm text-green-700">Analiza el impacto ambiental entre opciones y toma decisiones informadas.</p>
            </div>

            <!-- Etiquetas -->
            <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition animate__animated animate__fadeInRight animate__delay-4s">
                <img src="{{ asset('images/etiquetas_ecologicas.jpg') }}" alt="Etiquetas ecológicas" class="w-full h-44 object-contain mb-4">
                <span class="inline-block bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full mb-2">Identificación</span>
                <h3 class="text-xl font-semibold text-green-900 mb-2">Etiquetas Ecológicas</h3>
                <p class="text-sm text-green-700">Aprende a identificar productos certificados como sostenibles y responsables.</p>
            </div>
        </div>

        <!-- Sección de consejos extra -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-left">
            <div class="bg-white p-6 rounded-xl shadow animate__animated animate__fadeInLeft">
                <h4 class="text-green-800 font-bold mb-2">Evita el sobreempaque</h4>
                <p class="text-sm text-green-700">Opta por productos a granel o con envases reciclables o biodegradables.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow animate__animated animate__fadeInUp">
                <h4 class="text-green-800 font-bold mb-2">Apoya el comercio local</h4>
                <p class="text-sm text-green-700">Comprar a productores locales reduce emisiones y apoya la economía de tu comunidad.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow animate__animated animate__fadeInRight">
                <h4 class="text-green-800 font-bold mb-2">Verifica las certificaciones</h4>
                <p class="text-sm text-green-700">Busca etiquetas como FSC, Fair Trade, Ecolabel o USDA Organic para elegir mejor.</p>
            </div>
        </div>

    </div>
</section>

@endsection
