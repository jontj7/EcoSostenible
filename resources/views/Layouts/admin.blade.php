<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin | EcoSostenible')</title>

    {{-- Estilos con Tailwind + tu CSS si lo tienes --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Scroll suave y personalizado */
        body {
            scroll-behavior: smooth;
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #4ade80;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-gray-900 text-white font-sans antialiased">

    <main>
        @yield('content')
    </main>

</body>
</html>
