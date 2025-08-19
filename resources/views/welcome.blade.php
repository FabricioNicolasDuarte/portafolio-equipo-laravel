<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portafolio del Equipo</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        
        <!-- Video de Fondo -->
        <video autoplay muted loop class="fixed top-0 left-0 w-full h-full object-cover -z-10">
            <source src="{{ asset('videos/bienvenidos-video.mp4') }}" type="video/mp4">
            Tu navegador no soporta videos HTML5.
        </video>

        <!-- Contenedor principal centrado -->
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen">
            
            <!-- Contenido Central -->
            <div class="text-center">
                <!-- Título de Bienvenida -->
                <h1 class="text-5xl font-bold text-white tracking-wider mb-8">
                    ¡Bienvenidos!
                </h1>

                <!-- Contenedor de Botones -->
                @if (Route::has('login'))
                    <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-block bg-black text-white font-semibold px-8 py-3 rounded-lg shadow-lg hover:bg-gray-800 transition-colors duration-300">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="inline-block bg-black text-white font-semibold px-8 py-3 rounded-lg shadow-lg hover:bg-gray-800 transition-colors duration-300">Iniciar Sesión</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-block bg-black text-white font-semibold px-8 py-3 rounded-lg shadow-lg hover:bg-gray-800 transition-colors duration-300">Registrarse</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

        </div>
    </body>
</html>
