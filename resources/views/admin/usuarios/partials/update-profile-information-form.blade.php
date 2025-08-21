<section>
    <header>
        <h2 class="text-lg font-medium text-gray-100">
            {{ __('Información del Perfil') }}
        </h2>
        <p class="mt-1 text-sm text-gray-400">
            {{ __("Actualiza la información del perfil y la dirección de correo electrónico de la cuenta.") }}
        </p>
    </header>

    <form method="post" action="{{ route('admin.usuarios.actualizar', $usuario) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('put')

        <!-- Nombre -->
        <div>
            <x-input-label for="name" value="Nombre" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-gray-900 text-gray-200" :value="old('name', $usuario->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Apellido -->
        <div>
            <x-input-label for="last_name" value="Apellido" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full bg-gray-900 text-gray-200" :value="old('last_name', $usuario->last_name)" required autocomplete="family-name" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-gray-900 text-gray-200" :value="old('email', $usuario->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Carrera -->
        <div>
            <x-input-label for="career" value="Carrera" />
            <x-text-input id="career" name="career" type="text" class="mt-1 block w-full bg-gray-900 text-gray-200" :value="old('career', $usuario->career)" />
            <x-input-error class="mt-2" :messages="$errors->get('career')" />
        </div>

        <!-- Universidad -->
        <div>
            <x-input-label for="university" value="Universidad" />
            <x-text-input id="university" name="university" type="text" class="mt-1 block w-full bg-gray-900 text-gray-200" :value="old('university', $usuario->university)" />
            <x-input-error class="mt-2" :messages="$errors->get('university')" />
        </div>

        <!-- Acerca de -->
        <div>
            <x-input-label for="about_me" value="Acerca de mí" />
            <textarea id="about_me" name="about_me" class="border-gray-700 bg-gray-900 text-gray-200 focus:border-indigo-600 focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">{{ old('about_me', $usuario->about_me) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('about_me')" />
        </div>

        <!-- Teléfono (WhatsApp) -->
        <div>
            <x-input-label for="phone" value="Teléfono (WhatsApp)" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full bg-gray-900 text-gray-200" :value="old('phone', $usuario->phone)" placeholder="Ej: 5493704123456" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <!-- GitHub URL -->
        <div>
            <x-input-label for="github_url" value="Perfil de GitHub" />
            <x-text-input id="github_url" name="github_url" type="url" class="mt-1 block w-full bg-gray-900 text-gray-200" :value="old('github_url', $usuario->github_url)" placeholder="https://github.com/tu-usuario" />
            <x-input-error class="mt-2" :messages="$errors->get('github_url')" />
        </div>

        <!-- LinkedIn URL -->
        <div>
            <x-input-label for="linkedin_url" value="Perfil de LinkedIn" />
            <x-text-input id="linkedin_url" name="linkedin_url" type="url" class="mt-1 block w-full bg-gray-900 text-gray-200" :value="old('linkedin_url', $usuario->linkedin_url)" placeholder="https://linkedin.com/in/tu-usuario" />
            <x-input-error class="mt-2" :messages="$errors->get('linkedin_url')" />
        </div>

        <!-- Foto de Perfil -->
        <div>
            <x-input-label for="photo" value="Foto de Perfil" />
            <input id="photo" name="photo" type="file" class="mt-1 block w-full text-gray-400 file:bg-gray-700 file:border-0 file:text-gray-300 file:rounded-lg file:px-4 file:py-2 hover:file:bg-gray-600">
            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar Cambios') }}</x-primary-button>
        </div>
    </form>
</section>
