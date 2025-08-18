<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Información del Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Actualiza la información de tu perfil y tu dirección de correo electrónico.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- Nombre --}}
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                {{-- ... Bloque de verificación de email ... --}}
            @endif
        </div>
        
        {{-- ======================================================== --}}
        {{-- ||           INICIO DE CAMPOS PERSONALIZADOS          || --}}
        {{-- ======================================================== --}}
        
        <div>
            <x-input-label for="last_name" :value="__('Apellido')" />
            <x-text-input id="last_name" name="last_name" type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)" required autocomplete="family-name" />
            <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
        </div>

        <div>
            <x-input-label for="career" :value="__('Carrera')" />
            <x-text-input id="career" name="career" type="text" class="mt-1 block w-full" :value="old('career', $user->career)" autocomplete="organization-title" />
            <x-input-error class="mt-2" :messages="$errors->get('career')" />
        </div>

        <div>
            <x-input-label for="university" :value="__('Universidad')" />
            <x-text-input id="university" name="university" type="text" class="mt-1 block w-full" :value="old('university', $user->university)" autocomplete="organization" />
            <x-input-error class="mt-2" :messages="$errors->get('university')" />
        </div>

        <div>
            <x-input-label for="about_me" :value="__('Acerca de Mí')" />
            <textarea id="about_me" name="about_me" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">{{ old('about_me', $user->about_me) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('about_me')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Teléfono (WhatsApp)')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" placeholder="Ej: 5493704123456" />
            <p class="mt-1 text-sm text-gray-400">Incluir código de país sin el (+). Ej: 5493704123456</p>
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="github_url" :value="__('Perfil de GitHub')" />
            <x-text-input id="github_url" name="github_url" type="url" class="mt-1 block w-full" :value="old('github_url', $user->github_url)" />
            <x-input-error class="mt-2" :messages="$errors->get('github_url')" />
        </div>

        <div>
            <x-input-label for="linkedin_url" :value="__('Perfil de LinkedIn')" />
            <x-text-input id="linkedin_url" name="linkedin_url" type="url" class="mt-1 block w-full" :value="old('linkedin_url', $user->linkedin_url)" />
            <x-input-error class="mt-2" :messages="$errors->get('linkedin_url')" />
        </div>

        <!-- ============================================== -->
        <!-- || INICIO: Campo para Foto de Perfil (NUEVO) || -->
        <!-- ============================================== -->
        <div class="mt-6">
            <x-input-label for="photo" :value="__('Foto de Perfil (Avatar)')" />

            <div class="mt-2">
                <img src="{{ $user->photo_path ? asset('storage/' . $user->photo_path) : 'https://placehold.co/100x100/EBF4FF/7F9CF5?text=Avatar' }}" alt="Avatar actual" class="w-24 h-24 rounded-full object-cover">
            </div>

            <input id="photo" name="photo" type="file" class="mt-2 block w-full text-sm text-gray-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-violet-50 file:text-violet-700
                hover:file:bg-violet-100
            "/>

            <p class="mt-1 text-sm text-gray-600" id="file_input_help">PNG, JPG, GIF hasta 2MB.</p>

            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>
        <!-- ============================================== -->
        <!-- ||   FIN: Campo para Foto de Perfil (NUEVO)   || -->
        <!-- ============================================== -->

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Guardado.') }}</p>
            @endif
        </div>
    </form>
</section>