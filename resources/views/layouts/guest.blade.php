<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Portfolio Alumnos') }}</title>
        <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        
        <!-- Video de Fondo -->
        <video autoplay muted loop class="fixed top-0 left-0 w-full h-full object-cover -z-10">
            <source src="{{ asset('videos/login-video.mp4') }}" type="video/mp4">
            Tu navegador no soporta videos HTML5.
        </video>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            
            {{-- Título condicional que solo aparece en la página de registro --}}
            @if (request()->routeIs('register'))
                <h2 class="font-bold text-3xl text-white mb-4 tracking-wider">
                    ¡Registrate acá!
                </h2>
            @endif

            <!-- Contenido del formulario (login, registro, etc.) -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-black/50 backdrop-blur-md shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
