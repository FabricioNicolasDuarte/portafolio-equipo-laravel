<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        
        <!-- ==================== VIDEO DE FONDO ==================== -->
        <!-- Este video se posiciona detrás de todo el contenido -->
        <video autoplay muted loop class="fixed top-0 left-0 w-full h-full object-cover -z-10">
            <source src="{{ asset('videos/fondo-video.mp4') }}" type="video/mp4">
            Tu navegador no soporta videos HTML5.
        </video>
        <!-- ======================================================== -->

        <!-- Se quitó la clase "bg-gray-100" para que el fondo sea transparente y se vea el video -->
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <!-- Hacemos que la cabecera sea semi-transparente para un mejor efecto -->
                <header class="bg-white/75 backdrop-blur-sm shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>