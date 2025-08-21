<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Editando Perfil de') }} {{ $usuario->name }} {{ $usuario->last_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            {{-- Formulario para actualizar la información del perfil --}}
            <div class="p-4 sm:p-8 bg-black/50 backdrop-blur-md shadow sm:rounded-lg">
                <div class="max-w-xl text-gray-200">
                    @include('admin.usuarios.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Sección para eliminar el usuario --}}
            <div class="p-4 sm:p-8 bg-black/50 backdrop-blur-md shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-red-500">
                                {{ __('Eliminar Usuario') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-400">
                                {{ __('Una vez que la cuenta sea eliminada, todos sus recursos y datos serán borrados permanentemente. Esta acción no se puede deshacer.') }}
                            </p>
                        </header>

                        <x-danger-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                        >{{ __('Eliminar Usuario') }}</x-danger-button>

                        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('admin.usuarios.eliminar', $usuario) }}" class="p-6 bg-gray-800">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-100">
                                    {{ __('¿Estás seguro de que quieres eliminar esta cuenta?') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-400">
                                    {{ __('Por favor, confirma que deseas eliminar esta cuenta. Esta acción es irreversible.') }}
                                </p>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancelar') }}
                                    </x-secondary-button>

                                    <x-danger-button class="ms-3">
                                        {{ __('Sí, Eliminar Cuenta') }}
                                    </x-danger-button>
                                </div>
                            </form>
                        </x-modal>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
