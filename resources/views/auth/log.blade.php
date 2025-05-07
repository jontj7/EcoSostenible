<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión | EcoSostenible</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-green-100 via-emerald-100 to-green-200 min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md mx-4">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/eco.png') }}" alt="Logo EcoSostenible" class="w-20 h-20 rounded-full shadow-md">
        </div>

        <!-- Título -->
        <h2 class="text-2xl font-bold text-center text-green-800 mb-2">Inicia Sesión</h2>
        <p class="text-center text-green-700 mb-6">Bienvenido de vuelta a EcoSostenible</p>

        <!-- Mensajes -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center font-medium">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-center font-medium">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Formulario -->
        <form method="POST" action="{{ route('auth.login') }}">
            @csrf

            <!-- Correo -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-green-800 mb-1">Correo Electrónico</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 border {{ $errors->has('email') ? 'border-red-500' : 'border-green-300' }} rounded-md focus:ring-2 focus:ring-green-400 focus:outline-none placeholder:text-gray-400"
                    placeholder="tucorreo@ejemplo.com">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contraseña -->
            <div class="mb-4 relative">
                <label for="password" class="block text-sm font-medium text-green-800 mb-1">Contraseña</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-2 border {{ $errors->has('password') ? 'border-red-500' : 'border-green-300' }} rounded-md focus:ring-2 focus:ring-green-400 focus:outline-none placeholder:text-gray-400"
                    placeholder="********">
                <button type="button" onclick="togglePassword('password')" class="absolute right-3 top-9 text-green-700 text-sm hover:underline">
                    Mostrar
                </button>
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón -->
            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-md transition duration-200">
                Iniciar Sesión
            </button>
        </form>

      
        

        <!-- Enlace -->
        <p class="text-center text-sm text-green-700 mt-6">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}" class="font-medium hover:underline text-green-800">Regístrate aquí</a>
        </p>
    </div>
         

    <!-- Mostrar/Ocultar contraseña -->
    <script>
        function togglePassword(id) {
            const input = document.getElementById(id);
            const button = event.target;
            if (input.type === 'password') {
                input.type = 'text';
                button.textContent = 'Ocultar';
            } else {
                input.type = 'password';
                button.textContent = 'Mostrar';
            }
        }
    </script>

</body>
</html>
