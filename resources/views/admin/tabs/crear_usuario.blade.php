@extends('layouts.admin')

@section('title', 'Agregar Usuario | Panel Admin')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-gray-900 text-white p-6 rounded shadow-lg">
    <h2 class="text-2xl font-bold text-yellow-400 mb-6 flex items-center gap-2">
        <span class="text-purple-400 text-3xl">➕</span> Agregar Nuevo Usuario
    </h2>

    @if (session('success'))
        <div class="bg-green-700 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-700 text-white p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.usuario.crear') }}">
        @csrf

        <label class="block mb-2">Nombre</label>
        <input type="text" name="name" value="{{ old('name') }}" required
            class="w-full mb-4 px-4 py-2 rounded bg-gray-800 border border-yellow-400 text-white focus:outline-none">

        <label class="block mb-2">Correo</label>
        <input type="email" name="email" value="{{ old('email') }}" required
            class="w-full mb-4 px-4 py-2 rounded bg-gray-800 border border-yellow-400 text-white focus:outline-none">

        <label class="block mb-2">Contraseña</label>
        <input type="password" name="password" required
            class="w-full mb-4 px-4 py-2 rounded bg-gray-800 border border-yellow-400 text-white focus:outline-none">

        <label class="block mb-2">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" required
            class="w-full mb-6 px-4 py-2 rounded bg-gray-800 border border-yellow-400 text-white focus:outline-none">

        <button type="submit"
            class="w-full bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded transition">
            Crear Usuario
        </button>
    </form>

    <div class="text-center mt-6">
        <a href="{{ route('admin.dashboard') }}" class="text-sm text-blue-400 hover:underline">
            ⬅️ Volver al panel principal
        </a>
    </div>
</div>
@endsection
