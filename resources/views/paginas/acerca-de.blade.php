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

            <!-- Sección de Integrantes (Título Clickeable) -->
            <button id="openModalBtn" class="w-full text-center mb-6">
                <h3 class="text-2xl font-bold text-white hover:text-sky-400 transition-colors duration-300">Integrantes del Equipo de Desarrollo</h3>
            </button>
            
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <!-- Tarjeta de Fabricio Duarte -->
                <div class="bg-black/50 backdrop-blur-md overflow-hidden shadow-lg sm:rounded-lg p-6 flex flex-col items-center text-center">
                    <img class="h-24 w-24 rounded-full object-cover mb-4 border-2 border-sky-400" 
                         src="{{ asset('images/avatar-fabri.png') }}" 
                         alt="Foto de Fabricio Duarte">
                    <h3 class="text-lg font-medium text-white">Duarte Fabricio</h3>
                    <p class="text-sm text-gray-400">Líder de Equipo / UX/UI Designer / Full Stack Developer</p>
                </div>
                <!-- ... resto de las tarjetas de integrantes ... -->
                 <div class="bg-black/50 backdrop-blur-md overflow-hidden shadow-lg sm:rounded-lg p-6 flex flex-col items-center text-center">
                    <img class="h-24 w-24 rounded-full object-cover mb-4 border-2 border-sky-400" 
                         src="{{ asset('images/avatar-fabio.png') }}" 
                         alt="Foto de Fabio Arias">
                    <h3 class="text-lg font-medium text-white">Arias Fabio</h3>
                    <p class="text-sm text-gray-400">Full Stack Developer</p>
                </div>
                <div class="bg-black/50 backdrop-blur-md overflow-hidden shadow-lg sm:rounded-lg p-6 flex flex-col items-center text-center">
                    <img class="h-24 w-24 rounded-full object-cover mb-4 border-2 border-sky-400" 
                         src="{{ asset('images/avatar-enzo.png') }}" 
                         alt="Foto de Enzo Ascona">
                    <h3 class="text-lg font-medium text-white">Ascona Enzo</h3>
                    <p class="text-sm text-gray-400">Backend Developer</p>
                </div>
                <div class="bg-black/50 backdrop-blur-md overflow-hidden shadow-lg sm:rounded-lg p-6 flex flex-col items-center text-center">
                    <img class="h-24 w-24 rounded-full object-cover mb-4 border-2 border-sky-400" 
                         src="{{ asset('images/avatar-seba.png') }}" 
                         alt="Foto de Sebastián Amarilla">
                    <h3 class="text-lg font-medium text-white">Amarilla Sebastián</h3>
                    <p class="text-sm text-gray-400">Backend Developer</p>
                </div>
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

    <!-- Video Modal -->
    <div id="videoModal" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden transition-opacity duration-300">
        <div class="relative bg-black p-2 rounded-lg shadow-xl w-full max-w-sm mx-4">
            <button id="closeModal" class="absolute -top-10 right-0 text-white text-4xl hover:text-gray-400 transition-colors">&times;</button>
            <video id="teamVideo" class="w-full h-auto rounded" controls>
                <source src="{{ asset('videos/presentacion-equipo.mp4') }}" type="video/mp4">
                Tu navegador no soporta el video.
            </video>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModalBtn = document.getElementById('openModalBtn');
            const videoModal = document.getElementById('videoModal');
            const closeModalBtn = document.getElementById('closeModal');
            const teamVideo = document.getElementById('teamVideo');

            openModalBtn.addEventListener('click', () => {
                videoModal.classList.remove('hidden');
            });

            const closeModal = () => {
                videoModal.classList.add('hidden');
                teamVideo.pause();
                teamVideo.currentTime = 0;
            };

            closeModalBtn.addEventListener('click', closeModal);

            // Cierra el modal al presionar la tecla Escape
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && !videoModal.classList.contains('hidden')) {
                    closeModal();
                }
            });
        });
    </script>
</x-app-layout>
