@extends('layouts.app')

@section('content')

<section class="bg-gradient-to-r from-green-200 to-cyan-200 pt-24 pb-20" id="foro">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl sm:text-4xl font-bold text-green-900 mb-6">Conéctate con Otros</h2>
        <p class="text-green-800 mb-10 text-lg">Comparte tus ideas, experiencias y consejos para un mundo más sostenible.</p>

        <!-- Formulario de comentario -->
        <div class="bg-white p-6 rounded-lg shadow-lg mb-12">
            <h3 class="text-xl font-semibold text-green-900 mb-4">Comparte tu experiencia</h3>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded relative mb-4 animate-fade-in" role="alert">
                    <strong class="font-bold">¡Éxito!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif


            @auth
                <form action="{{ route('foro.comentario') }}" method="POST" class="space-y-4 text-left">
                    @csrf
                    <select name="categoria" class="w-full p-3 border rounded-lg focus:outline-none focus:ring focus:border-green-400" required>
                        <option value="">Selecciona una categoría</option>
                        <option value="Reciclaje">Reciclaje</option>
                        <option value="Consumo">Consumo Responsable</option>
                        <option value="Reducción">Reducción de Residuos</option>
                        <option value="Consejo">Consejos Rápidos</option>
                    </select>
                    <textarea name="content" rows="4" placeholder="Escribe tu comentario..." required class="w-full p-3 border rounded-lg focus:outline-none focus:ring focus:border-green-400"></textarea>
                    <button type="submit" class="bg-green-700 text-white px-6 py-3 rounded-full shadow hover:bg-green-800 transition">
                        Publicar
                    </button>
                </form>
            @else
                <p class="text-green-700 mb-4">Debes iniciar sesión para dejar un comentario.</p>
                <a href="{{ route('auth') }}" class="bg-green-600 text-white px-6 py-3 rounded-full shadow hover:bg-green-700 transition">Iniciar Sesión</a>
            @endauth
        </div>

        <!-- Comentarios organizados -->
        <div class="text-left space-y-8">
            @php
                $comentarios = \App\Models\Comment::with('user')->latest()->get()->groupBy('categoria');
            @endphp

            @foreach($comentarios as $categoria => $grupo)
                <div>
                    <h4 class="text-xl font-bold text-green-800 mb-2">
                        @switch($categoria)
                            @case('Reciclaje') 🌱 @break
                            @case('Consumo') 🛒 @break
                            @case('Reducción') 🚯 @break
                            @case('Consejo') ♻️ @break
                            @default 📝
                        @endswitch
                        {{ $categoria }}
                    </h4>
                    @foreach($grupo as $comentario)
                        <div class="bg-white p-4 rounded shadow mb-2">
                            <p><strong>{{ $comentario->user->name }}:</strong> {{ $comentario->content }}</p>
                            <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
