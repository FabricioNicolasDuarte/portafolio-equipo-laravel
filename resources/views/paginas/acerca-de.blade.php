<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Acerca de la Aplicación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black/50 backdrop-blur-md overflow-hidden shadow-lg sm:rounded-lg p-8 text-gray-200 space-y-6">

                <h3 class="text-2xl font-bold text-white border-b border-gray-600 pb-3">
                    Portafolio de Equipo - UTN Programación IV
                </h3>

                <p class="text-lg leading-relaxed">
                    Esta aplicación web fue desarrollada como proyecto final para la materia Programación IV de la Tecnicatura Universitaria en Programación (UTN-FRRE). Funciona como un portafolio dinámico y centralizado para los integrantes del equipo de desarrollo.
                </p>

                <p class="leading-relaxed">
                    El objetivo principal es permitir que cada miembro pueda gestionar su propio perfil profesional, mostrando su información académica, una breve biografía y enlaces a sus redes sociales y de contacto. La plataforma está diseñada con un sistema de roles que distingue entre "Alumnos" y "Administradores", permitiendo a estos últimos una gestión completa de todos los perfiles.
                </p>

                <div class="pt-4">
                    <h4 class="text-xl font-semibold text-sky-400 mb-2">Tecnologías Clave:</h4>
                    <ul class="list-disc list-inside text-gray-300">
                        <li><strong>Backend:</strong> Laravel 12</li>
                        <li><strong>Frontend:</strong> Blade con Tailwind CSS</li>
                        <li><strong>Base de Datos:</strong> MySQL</li>
                        <li><strong>Autenticación:</strong> Laravel Breeze</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>