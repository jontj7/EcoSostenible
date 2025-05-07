@extends('layouts.admin')

@section('title', 'Acceso Denegado')

@section('content')
<div class="min-h-screen bg-black text-white flex flex-col items-center justify-center px-6 relative overflow-hidden">
    {{-- Fondo con animación de advertencia --}}
    <div class="absolute inset-0 z-0 animate-pulse bg-gradient-to-br from-red-900 via-black to-red-800 opacity-80"></div>

    {{-- Icono prohibido --}}
    <div class="z-10 text-center">
        <div class="animate-ping inline-flex items-center justify-center w-24 h-24 bg-red-600 text-white rounded-full mb-6">
            <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M21 12A9 9 0 1 1 3 12a9 9 0 0 1 18 0z" />
            </svg>
        </div>

        {{-- Mensajes grandes y aterradores --}}
        <h1 class="text-6xl font-extrabold text-red-600 drop-shadow-lg mb-4 animate-pulse">403</h1>
        <h2 class="text-3xl font-bold text-red-400 mb-2">⚠️ ACCESO DENEGADO</h2>
        <p class="text-lg text-gray-300 max-w-xl mx-auto mb-6">
            Este sector es confidencial. Solo el <span class="text-red-500 font-bold">administrador autorizado</span> puede entrar.
            Cualquier intento no autorizado será reportado... 😈
        </p>

        {{-- Botón de huida --}}
        <a href="{{ route('inicio') }}"
           class="bg-red-700 hover:bg-red-800 text-white px-6 py-3 rounded shadow-xl uppercase tracking-widest transition-all">
            🏃‍♂️ ¡Salir de aquí!
        </a>
    </div>

    {{-- Efecto glitch de fondo con CSS --}}
    <style>
        body {
            background-color: black;
            font-family: 'Courier New', Courier, monospace;
        }
        .glitch::after {
            content: '403';
            position: absolute;
            left: 2px;
            text-shadow: -1px 0 red;
            color: white;
            background: transparent;
            animation: glitch 1s infinite linear alternate-reverse;
        }

        @keyframes glitch {
            0% { transform: translate(0); }
            20% { transform: translate(-2px, 2px); }
            40% { transform: translate(-2px, -2px); }
            60% { transform: translate(2px, 2px); }
            80% { transform: translate(2px, -2px); }
            100% { transform: translate(0); }
        }
    </style>
</div>
@endsection
