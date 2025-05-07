@extends('layouts.app')

@section('title', 'Mi Perfil | EcoSostenible')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-green-800 mb-4">Editar Perfil</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded-md mb-4">
            <ul class="list-disc pl-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('perfil.update') }}">
        @csrf

        <!-- Avatar actual -->
        <div class="mb-6 text-center">
            <img 
                id="avatarPreview" 
                src="{{ asset(Auth::user()->avatar ?? 'images/ecoUser.png') }}" 
                alt="Avatar" 
                class="w-24 h-24 rounded-full mx-auto mb-2 border shadow object-cover"
                onerror="this.onerror=null; this.src='{{ asset('images/ecoUser.png') }}';"
            >
            <p class="text-green-700 text-sm">Avatar actual</p>
        </div>

        <!-- Selección de avatar prediseñado -->
        <div class="mb-6">
            <p class="text-green-800 font-semibold text-sm mb-2 text-center">Selecciona un nuevo avatar:</p>
            <div class="grid grid-cols-4 gap-4 justify-center">
                @php
                    $avatars = [
                        'avatar1.jpg', 'avatar2.jpg', 'avatar3.jpg', 'avatar4.jpg',
                        'avatar5.jpg', 'avatar6.png', 'avatar7.png', 'avatar8.png'
                    ];
                @endphp

                @foreach ($avatars as $avatar)
                    <label class="cursor-pointer relative">
                        <input type="radio" name="predefined_avatar" value="{{ $avatar }}" class="sr-only" onchange="changeAvatar('{{ asset('images/avatars/' . $avatar) }}')">
                        <img src="{{ asset('images/avatars/' . $avatar) }}" 
                             alt="avatar" 
                             class="w-16 h-16 rounded-full border-4 border-transparent hover:border-green-500 transition-all duration-300 object-cover">
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Nombre -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-green-800 mb-1">Nombre</label>
            <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" required
                class="w-full px-4 py-2 border border-green-300 rounded-md focus:ring-2 focus:ring-green-400 focus:outline-none">
        </div>

        <!-- Correo -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-green-800 mb-1">Correo Electrónico</label>
            <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}" required
                class="w-full px-4 py-2 border border-green-300 rounded-md focus:ring-2 focus:ring-green-400 focus:outline-none">
        </div>

        <!-- Nueva Contraseña -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-green-800 mb-1">Nueva Contraseña</label>
            <input type="password" name="password" id="password"
                class="w-full px-4 py-2 border border-green-300 rounded-md focus:ring-2 focus:ring-green-400 focus:outline-none" placeholder="Dejar vacío si no desea cambiarla">
        </div>

        <!-- Confirmar Contraseña -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-green-800 mb-1">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="w-full px-4 py-2 border border-green-300 rounded-md focus:ring-2 focus:ring-green-400 focus:outline-none">
        </div>

        <!-- Botón -->
        <div class="text-center">
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-md transition">
                Guardar Cambios
            </button>
        </div>
    </form>
</div>

{{-- JS para cambiar preview al seleccionar --}}
<script>
    function changeAvatar(src) {
        document.getElementById('avatarPreview').src = src;
    }
</script>
@endsection
