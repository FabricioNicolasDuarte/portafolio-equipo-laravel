<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                {{ __('Gestión de Usuarios') }}
            </h2>
            {{-- Botón para descargar el PDF --}}
            <a href="{{ route('admin.usuarios.pdf') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Descargar Lista (PDF)
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Mensaje de éxito --}}
            @if (session('status'))
                <div class="mb-4 bg-emerald-500/90 border border-emerald-600 text-white px-4 py-3 rounded-lg relative" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            <div class="bg-black/50 backdrop-blur-md overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-200 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    @forelse ($usuarios as $usuario)
                        <div class="bg-gray-800/50 border border-gray-700 rounded-lg p-4 flex flex-col items-center text-center transition-transform transform hover:scale-105">
                            {{-- Imagen de perfil con fallback --}}
                            <img class="h-24 w-24 rounded-full object-cover mb-4 border-2 border-sky-400" 
                                 src="{{ $usuario->photo_path ? asset('storage/' . $usuario->photo_path) : 'https://placehold.co/100x100/EBF4FF/7F9CF5?text=Avatar' }}" 
                                 alt="Foto de {{ $usuario->name }}">
                            
                            {{-- Nombre y Carrera --}}
                            <h3 class="text-lg font-medium text-white">{{ $usuario->name }} {{ $usuario->last_name }}</h3>
                            <p class="text-sm text-gray-400">{{ $usuario->career ?? 'Carrera no especificada' }}</p>
                            
                            {{-- Botón para ver el perfil --}}
                            <a href="{{ route('equipo.ver', $usuario) }}" class="mt-4 inline-flex items-center px-4 py-2 bg-sky-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Ver Perfil
                            </a>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-8">
                            <p class="text-gray-400">No hay usuarios para mostrar.</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
