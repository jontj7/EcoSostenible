@extends('layouts.admin')

@section('title', 'Panel Administrativo | EcoSostenible')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 text-white">
    <h1 class="text-3xl font-bold text-green-400 mb-6">Panel de Administración</h1>

    <div class="flex gap-4 mb-8">
        <a href="{{ route('admin.dashboard', ['tab' => 'usuarios']) }}" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded text-white">Usuarios</a>
        <a href="{{ route('admin.dashboard', ['tab' => 'comentarios']) }}" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded text-white">Comentarios</a>
        <a href="{{ route('admin.dashboard', ['tab' => 'estadisticas']) }}" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded text-white">Estadísticas</a>
    </div>

    @php
        $tab = request()->get('tab', 'usuarios');
    @endphp

    @if ($tab === 'usuarios')
        @include('admin.tabs.usuarios')
    @elseif ($tab === 'comentarios')
        @include('admin.tabs.comentarios')
    @elseif ($tab === 'estadisticas')
        @include('admin.tabs.estadisticas')
    @else
        <div class="text-red-400">Sección no encontrada.</div>
    @endif
</div>
@endsection
