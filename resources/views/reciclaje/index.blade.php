@extends('layouts.app')

@section('content')

<section id="reciclaje" class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Título -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-green-900 mb-4 animate__animated animate__fadeInUp">
                Aprende a Reciclar ♻️
            </h2>
            <p class="text-lg text-green-700 animate__animated animate__fadeInUp animate__delay-1s">
                Descubre cómo reciclar correctamente y ayuda a cuidar nuestro planeta.
            </p>
        </div>

        <!-- Guía de Reciclaje -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            @foreach ([
                ['img' => 'plastico.jpg', 'title' => 'Plástico', 'desc' => 'Botellas, bolsas, envases duros. Enjuagar y comprimir.'],
                ['img' => 'papel.jpg', 'title' => 'Papel', 'desc' => 'Hojas, periódicos, cajas limpias. No papel sucio o húmedo.'],
                ['img' => 'vidrio.jpg', 'title' => 'Vidrio', 'desc' => 'Frascos, botellas. Separar colores si es posible.'],
                ['img' => 'metal.jpg', 'title' => 'Metales', 'desc' => 'Latas, aluminio. Enjuagar antes de desechar.']
            ] as $material)
                <div class="bg-green-50 rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-all animate__animated animate__zoomIn">
                    <img src="{{ asset('images/' . $material['img']) }}" alt="{{ $material['title'] }}" class="w-20 h-20 mx-auto mb-4">
                    <h3 class="text-xl font-semibold text-green-800 mb-2">{{ $material['title'] }}</h3>
                    <p class="text-sm text-green-700">{{ $material['desc'] }}</p>
                </div>
            @endforeach
        </div>

        <!-- Video Tutoriales -->
        <div class="mb-16">
            <h3 class="text-2xl font-bold text-green-900 mb-6 text-center">🎥 Video Tutoriales</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <iframe class="w-full h-64 rounded-lg shadow" src="https://www.youtube.com/watch?v=DweX0pLybpQ" title="Tutorial 1" frameborder="0" allowfullscreen></iframe>
                <iframe class="w-full h-64 rounded-lg shadow" src="https://www.youtube.com/watch?v=jDjNnq3Y5Ck" title="Tutorial 2" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>

        <!-- Mapa de puntos de reciclaje -->
        <div>
            <h3 class="text-2xl font-bold text-green-900 mb-6 text-center">📍 Puntos de Reciclaje Cercanos</h3>
            <div id="map" class="w-full h-96 rounded-lg shadow-md"></div>
        </div>
    </div>
</section>

@endsection