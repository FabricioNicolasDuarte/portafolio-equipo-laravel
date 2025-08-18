<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Perfil de {{ $usuario->name }} {{ $usuario->last_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            {{-- Mensaje de éxito al actualizar --}}
            @if (session('status'))
                <div class="mb-4 bg-emerald-500/90 border border-emerald-600 text-white px-4 py-3 rounded-lg relative" role="alert">
                    <span class="block sm:inline">{{ session('status') }}</span>
                </div>
            @endif

            <div class="bg-black/50 backdrop-blur-md overflow-hidden shadow-lg sm:rounded-lg p-8 space-y-6 text-gray-200">

                {{-- Sección de Foto y Nombre --}}
                <div class="flex flex-col sm:flex-row items-center sm:items-start text-center sm:text-left space-y-4 sm:space-y-0 sm:space-x-6">
                    <img class="h-32 w-32 rounded-full object-cover border-4 border-sky-500"
                         src="{{ $usuario->photo_path ? asset('storage/' . $usuario->photo_path) : 'https://placehold.co/150x150/EBF4FF/7F9CF5?text=Avatar' }}"
                         alt="Foto de {{ $usuario->name }}">
                    <div>
                        <h3 class="text-2xl font-bold text-white">{{ $usuario->name }} {{ $usuario->last_name }}</h3>
                        <p class="text-lg text-gray-300">{{ $usuario->career ?? 'Carrera no especificada' }}</p>
                        <p class="text-md text-gray-400">{{ $usuario->university ?? 'Universidad no especificada' }}</p>
                    </div>
                </div>

                {{-- Sección "Acerca de Mí" --}}
                <div>
                    <h4 class="font-bold text-lg border-b border-gray-600 pb-2 mb-2 text-sky-400">Acerca de Mí</h4>
                    <p class="text-gray-300 whitespace-pre-wrap">{{ $usuario->about_me ?? 'No hay información disponible.' }}</p>
                </div>
                
                {{-- Sección de Contacto y Redes --}}
                <div>
                    <h4 class="font-bold text-lg border-b border-gray-600 pb-2 mb-2 text-sky-400">Contacto y Redes</h4>
                    <ul class="space-y-2 text-gray-300">
                        <li><strong>Email:</strong> {{ $usuario->email }}</li>
                        
                        <!-- ======================================================== -->
                        <!-- ||      INICIO: LÓGICA DEL ENLACE DE WHATSAPP        || -->
                        <!-- ======================================================== -->
                        @if ($usuario->phone)
                            <li class="flex items-center">
                                <strong>Teléfono:</strong>
                                <a href="https://wa.me/{{ $usuario->phone }}" target="_blank" class="ml-2 flex items-center text-emerald-400 hover:text-emerald-300 hover:underline transition-colors">
                                    <span>{{ $usuario->phone }}</span>
                                    <!-- Icono de WhatsApp -->
                                    <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.886-.001 2.267.655 4.398 1.803 6.12l-1.34 4.894 5.068-1.339z" /></svg>
                                </a>
                            </li>
                        @else
                            <li><strong>Teléfono:</strong> No disponible</li>
                        @endif
                        <!-- ======================================================== -->
                        <!-- ||        FIN: LÓGICA DEL ENLACE DE WHATSAPP         || -->
                        <!-- ======================================================== -->

                        @if ($usuario->github_url)
                            <li><a href="{{ $usuario->github_url }}" target="_blank" class="text-sky-400 hover:underline">Perfil de GitHub</a></li>
                        @endif
                        @if ($usuario->linkedin_url)
                            <li><a href="{{ $usuario->linkedin_url }}" target="_blank" class="text-sky-400 hover:underline">Perfil de LinkedIn</a></li>
                        @endif
                    </ul>
                </div>

                {{-- Lógica del Botón de Editar --}}
                @can('update', $usuario)
                    <div class="mt-8 text-right">
                        @if(Auth::user()->is_admin)
                            <a href="{{ route('admin.usuarios.editar', $usuario) }}" class="inline-flex items-center px-4 py-2 bg-amber-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Editar como Administrador
                            </a>
                        @elseif(Auth::id() == $usuario->id)
                            <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-sky-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Editar mi Perfil
                            </a>
                        @endif
                    </div>
                @endcan
                
            </div>
        </div>
    </div>
</x-app-layout>