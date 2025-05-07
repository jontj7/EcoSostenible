@extends('layouts.admin')

@section('title', 'Panel Administrativo | EcoSostenible')

@section('content')
<div class="text-white px-6 py-6">

    {{-- Título y botones superiores --}}
    <div class="flex justify-between items-center mb-6 flex-wrap gap-2">
        <h1 class="text-3xl font-bold text-green-400 animate-pulse">🌿 Panel de Administración</h1>
        <div class="flex gap-2 flex-wrap">
            <a href="{{ route('inicio') }}" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded shadow transition">🏠 Volver al sitio</a>
            <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 hover:bg-gray-700 px-4 py-2 rounded shadow transition">⬅️ Panel Principal</a>
            <a href="{{ route('admin.usuario.form') }}" class="bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded shadow transition text-black font-semibold">➕ Agregar Usuario</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded shadow transition">🚪 Cerrar Sesión</button>
            </form>
        </div>
    </div>
    

    {{-- Tarjetas Resumen --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-green-800 rounded p-4 shadow hover:scale-105 transition transform">
            <p class="text-sm text-green-200">Usuarios Registrados</p>
            <h2 class="text-2xl font-bold">{{ $usuarios->count() }}</h2>
        </div>
        <div class="bg-blue-800 rounded p-4 shadow hover:scale-105 transition transform">
            <p class="text-sm text-blue-200">Comentarios Publicados</p>
            <h2 class="text-2xl font-bold">{{ $comentarios->count() }}</h2>
        </div>
        <div class="bg-yellow-600 rounded p-4 shadow hover:scale-105 transition transform">
            <p class="text-sm text-yellow-100">Último Usuario</p>
            <h2 class="text-lg font-semibold truncate">{{ $usuarios->last()->name ?? 'N/A' }}</h2>
        </div>
    </div>

    {{-- Navegación de pestañas --}}
    <div class="flex flex-wrap gap-2 mb-6">
        <a href="{{ route('admin.dashboard', ['tab' => 'usuarios']) }}" class="bg-blue-700 px-4 py-2 rounded hover:bg-blue-800 transition">👥 Usuarios</a>
        <a href="{{ route('admin.dashboard', ['tab' => 'comentarios']) }}" class="bg-blue-700 px-4 py-2 rounded hover:bg-blue-800 transition">💬 Comentarios</a>
        <a href="{{ route('admin.estadisticas') }}" class="bg-blue-700 px-4 py-2 rounded hover:bg-blue-800 transition">📊 Estadísticas</a>

    </div>

    {{-- Contenido dinámico --}}
    @php $tab = $tab ?? request('tab'); @endphp

    @if ($tab === 'usuarios')
        @include('admin.tabs.usuarios')
    @elseif ($tab === 'comentarios')
        @include('admin.tabs.comentarios')
    @elseif ($tab === 'estadisticas' && isset($estadisticas) && isset($rango))
    @include('admin.tabs.estadisticas', ['estadisticas' => $estadisticas, 'rango' => $rango])
@elseif ($tab === 'estadisticas')
    <div class="text-red-400 text-center mt-10">
        Error: Estadísticas no disponibles. Por favor accede desde <a href="{{ route('admin.tabs.estadisticas') }}" class="underline">/admin/estadisticas</a>.
    </div>

    @elseif ($tab === 'editar_usuario' && isset($usuario))
        @include('admin.tabs.editar_usuario')
    @elseif ($tab === 'editar_comentario' && isset($comentario))
        @include('admin.tabs.editar_comentario')
    @else
        <div class="text-center text-gray-400 mt-10">
            <p class="text-lg">📌 Selecciona una opción del panel para comenzar.</p>
            <img src="{{ asset('images/eco.png') }}" alt="Panel Admin" class="mx-auto w-1/3 mt-4 opacity-50">
        </div>
    @endif
</div>
@endsection
