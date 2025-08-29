<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Portfolio Alumnos</title>
        <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        
        <video autoplay muted loop class="fixed top-0 left-0 w-full h-full object-cover -z-10">
            <source src="{{ asset('videos/bienvenidos-video.mp4') }}" type="video/mp4">
            Tu navegador no soporta videos HTML5.
        </video>

        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen">
            
            <div class="text-center">
                <h1 class="text-5xl font-bold text-white tracking-wider mb-8">
                    ¡Bienvenidos!
                </h1>

                @if (Route::has('login'))
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="inline-block bg-black text-white font-semibold px-8 py-3 rounded-lg shadow-lg hover:bg-gray-800 transition-colors duration-300">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="inline-block bg-black text-white font-semibold px-8 py-3 rounded-lg shadow-lg hover:bg-gray-800 transition-colors duration-300">Iniciar Sesión</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="inline-block bg-black text-white font-semibold px-7 py-3 rounded-lg shadow-lg hover:bg-gray-800 transition-colors duration-300">Registrarse</a>
                                @endif
                            @endauth
                        </div>

                        <div class="mt-4">
                           <a href="{{ asset('videos/presentacion-equipo.mp4') }}" class="inline-block bg-black/20 text-white font-semibold px-20 py-3 rounded-lg shadow-lg hover:bg-black/60 transition-colors duration-100 backdrop-blur-sm border-2 border-lime-500">Ver Equipo Developer</a>
                        </div>
                        </div>
                @endif
            </div>

        </div>
    </body>
</html>