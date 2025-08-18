<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editando Perfil de') }} {{ $usuario->name }} {{ $usuario->last_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{-- Incluimos el formulario parcial que crearemos a continuación --}}
                    @include('admin.usuarios.partials.update-profile-information-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>