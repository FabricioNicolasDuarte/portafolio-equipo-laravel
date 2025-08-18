<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Información del Perfil') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Actualiza la información del perfil y la dirección de correo electrónico de la cuenta.") }}
        </p>
    </header>

    <form method="post" action="{{ route('admin.usuarios.actualizar', $usuario) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('put')

        {{-- Nombre --}}
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $usuario->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- Apellido --}}
        <div>
            <x-input-label for="last_name" :value="__('Apellido')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $usuario->last_name)" required autocomplete="family-name" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $usuario->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        {{-- Carrera --}}
        <div>
            <x-input-label for="career" :value="__('Carrera')" />
            <x-text-input id="career" name="career" type="text" class="mt-1 block w-full" :value="old('career', $usuario->career)" />
            <x-input-error class="mt-2" :messages="$errors->get('career')" />
        </div>

        {{-- Universidad --}}
        <div>
            <x-input-label for="university" :value="__('Universidad')" />
            <x-text-input id="university" name="university" type="text" class="mt-1 block w-full" :value="old('university', $usuario->university)" />
            <x-input-error class="mt-2" :messages="$errors->get('university')" />
        </div>

        {{-- Acerca de Mí --}}
        <div>
            <x-input-label for="about_me" :value="__('Acerca de Mí')" />
            <textarea id="about_me" name="about_me" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">{{ old('about_me', $usuario->about_me) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('about_me')" />
        </div>

        {{-- Teléfono --}}
        <div>
            <x-input-label for="phone" :value="__('Teléfono')" />
            <x-text-input id="phone" name="phone" type="tel" class="mt-1 block w-full" :value="old('phone', $usuario->phone)" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        {{-- GitHub URL --}}
        <div>
            <x-input-label for="github_url" :value="__('Perfil de GitHub')" />
            <x-text-input id="github_url" name="github_url" type="url" class="mt-1 block w-full" :value="old('github_url', $usuario->github_url)" />
            <x-input-error class="mt-2" :messages="$errors->get('github_url')" />
        </div>

        {{-- LinkedIn URL --}}
        <div>
            <x-input-label for="linkedin_url" :value="__('Perfil de LinkedIn')" />
            <x-text-input id="linkedin_url" name="linkedin_url" type="url" class="mt-1 block w-full" :value="old('linkedin_url', $usuario->linkedin_url)" />
            <x-input-error class="mt-2" :messages="$errors->get('linkedin_url')" />
        </div>

        {{-- Foto de Perfil --}}
        <div class="mt-6">
            <x-input-label for="photo" :value="__('Foto de Perfil (Avatar)')" />
            <div class="mt-2">
                <img src="{{ $usuario->photo_path ? asset('storage/' . $usuario->photo_path) : 'https://placehold.co/100x100/EBF4FF/7F9CF5?text=Avatar' }}" alt="Avatar actual" class="w-24 h-24 rounded-full object-cover">
            </div>
            <input id="photo" name="photo" type="file" class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100"/>
            <p class="mt-1 text-sm text-gray-600">PNG, JPG, GIF hasta 2MB.</p>
            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar Cambios') }}</x-primary-button>
        </div>
    </form>
</section>