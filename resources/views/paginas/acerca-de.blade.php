<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Acerca de la Aplicación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Sección de Descripción -->
            <div class="bg-black/50 backdrop-blur-md overflow-hidden shadow-lg sm:rounded-lg p-8 mb-8">
                <h3 class="text-2xl font-bold text-white mb-4 border-b border-gray-600 pb-2">Portfolio de Equipo - UTN Programación IV</h3>
                <div class="text-gray-300 space-y-4">
                    <p>
                        Esta aplicación web fue desarrollada como proyecto piloto para la materia Programación IV de la Tecnicatura Universitaria en Programación (UTN-FRRE). Funciona como un portafolio dinámico y centralizado para los alumnos de dicha materia.
                    </p>
                    <p>
                        El objetivo principal es permitir que cada miembro pueda plasmar su propio perfil profesional, mostrando su información académica, una breve biografía y enlaces a sus redes sociales y de contacto. La plataforma está diseñada con un sistema de roles que distingue entre "Alumnos" y "Administradores", permitiendo a estos últimos una gestión completa de todos los perfiles.
                    </p>
                    <div>
                        <h4 class="font-semibold text-white">Tecnologías Clave:</h4>
                        <ul class="list-disc list-inside ml-4 mt-2">
                            <li>Backend: Laravel 12</li>
                            <li>Frontend: Blade con Tailwind CSS</li>
                            <li>Base de Datos: MySQL</li>
                            <li>Autenticación: Laravel Breeze</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sección de Integrantes -->
            <h3 class="text-2xl font-bold text-white mb-6 text-center">Integrantes del Equipo de Desarrollo</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">

                <!-- Tarjeta de Fabricio Duarte -->
                <div class="bg-black/50 backdrop-blur-md overflow-hidden shadow-lg sm:rounded-lg p-6 flex flex-col items-center text-center">
                    <img class="h-24 w-24 rounded-full object-cover mb-4 border-2 border-sky-400" 
                         src="{{ asset('images/avatar-fabri.png') }}" 
                         alt="Foto de Fabricio Duarte">
                    <h3 class="text-lg font-medium text-white">Duarte Fabricio</h3>
                    <p class="text-sm text-gray-400">Líder de Equipo / UX/UI Designer / Full Stack Developer</p>
                </div>

                <!-- Tarjeta de Fabio Arias -->
                <div class="bg-black/50 backdrop-blur-md overflow-hidden shadow-lg sm:rounded-lg p-6 flex flex-col items-center text-center">
                    <img class="h-24 w-24 rounded-full object-cover mb-4 border-2 border-sky-400" 
                         src="{{ asset('images/avatar-fabio.png') }}" 
                         alt="Foto de Fabio Arias">
                    <h3 class="text-lg font-medium text-white">Arias Fabio</h3>
                    <p class="text-sm text-gray-400">Full Stack Developer</p>
                </div>

                <!-- Tarjeta de Enzo Ascona -->
                <div class="bg-black/50 backdrop-blur-md overflow-hidden shadow-lg sm:rounded-lg p-6 flex flex-col items-center text-center">
                    <img class="h-24 w-24 rounded-full object-cover mb-4 border-2 border-sky-400" 
                         src="{{ asset('images/avatar-enzo.png') }}" 
                         alt="Foto de Enzo Ascona">
                    <h3 class="text-lg font-medium text-white">Ascona Enzo</h3>
                    <p class="text-sm text-gray-400">Backend Developer</p>
                </div>

                <!-- Tarjeta de Sebastián Amarilla -->
                <div class="bg-black/50 backdrop-blur-md overflow-hidden shadow-lg sm:rounded-lg p-6 flex flex-col items-center text-center">
                    <img class="h-24 w-24 rounded-full object-cover mb-4 border-2 border-sky-400" 
                         src="{{ asset('images/avatar-seba.png') }}" 
                         alt="Foto de Sebastián Amarilla">
                    <h3 class="text-lg font-medium text-white">Amarilla Sebastián</h3>
                    <p class="text-sm text-gray-400">Backend Developer</p>
                </div>

                <!-- Tarjeta de Marcelo Coronel -->
                <div class="bg-black/50 backdrop-blur-md overflow-hidden shadow-lg sm:rounded-lg p-6 flex flex-col items-center text-center">
                    <img class="h-24 w-24 rounded-full object-cover mb-4 border-2 border-sky-400" 
                         src="{{ asset('images/avatar-marce.png') }}" 
                         alt="Foto de Marcelo Coronel">
                    <h3 class="text-lg font-medium text-white">Coronel Marcelo</h3>
                    <p class="text-sm text-gray-400">Frontend Developer</p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
