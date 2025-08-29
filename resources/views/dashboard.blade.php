<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Portfolio Alumnos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($alumnos as $alumno)
                <div class="bg-black/50 backdrop-blur-md overflow-hidden shadow-lg sm:rounded-lg p-6 flex flex-col items-center text-center">
                    <img class="h-24 w-24 rounded-full object-cover mb-4 border-2 border-sky-400" 
                         src="{{ $alumno->photo_path ? asset('storage/' . $alumno->photo_path) : 'https://placehold.co/100x100/EBF4FF/7F9CF5?text=Avatar' }}" 
                         alt="Foto de {{ $alumno->name }}">

                    <h3 class="text-lg font-medium text-white">{{ $alumno->name }} {{ $alumno->last_name }}</h3>
                    <p class="text-sm text-gray-400">{{ $alumno->career ?? 'Carrera no especificada' }}</p>

                    <!-- Este botón lleva al perfil público, que es de solo lectura -->
                    <a href="{{ route('equipo.ver', $alumno) }}" class="mt-4 inline-flex items-center px-4 py-2 bg-sky-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Ver Perfil
                    </a>
                </div>
                @empty
                <div class="bg-black/50 backdrop-blur-md overflow-hidden shadow-lg sm:rounded-lg p-6 col-span-3">
                    <p class="text-center text-gray-300">Aún no hay perfiles de alumnos para mostrar.</p>
                </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
