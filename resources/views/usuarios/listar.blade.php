<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuestro Equipo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    @foreach ($usuarios as $usuario)
                    <div class="border border-gray-200 rounded-lg p-4 flex flex-col items-center text-center transition-transform transform hover:scale-105">
                        {{-- Imagen de perfil con fallback --}}
                        <img class="h-24 w-24 rounded-full object-cover mb-4" 
                             src="{{ $usuario->photo_path ? asset('storage/' . $usuario->photo_path) : 'https://placehold.co/100x100/EBF4FF/7F9CF5?text=Avatar' }}" 
                             alt="Foto de {{ $usuario->name }}">
                        
                        {{-- Nombre y Carrera --}}
                        <h3 class="text-lg font-medium">{{ $usuario->name }} {{ $usuario->last_name }}</h3>
                        <p class="text-sm text-gray-600">{{ $usuario->career ?? 'Carrera no especificada' }}</p>
                        
                        {{-- Botón para ver el perfil --}}
                        <a href="{{ route('equipo.ver', $usuario) }}" class="mt-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Ver Perfil
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>