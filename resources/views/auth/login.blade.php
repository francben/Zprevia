<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>
        <h1 class="mb-1" style="font-family:Poppins, sans-serif;font-size:26px;font-weight:900;">{{ __('Hola!') }}</h1>
        <p class="mb-6" style="font-size:18px;">{{ __('Bienvenido de vuelta') }}</p>


        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="relative">
                <x-label for="email" value="{{ __('Email') }}" style="display:none"/>
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 "style="padding: 13px;">
                    <i class="fa-regular fa-envelope text-gris-400"></i>
                </span>
                <x-input style="font-family:Poppins, sans-serif;font-size:14px; padding-left: 2.5rem;" id="email" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block mt-1 w-full pl-10" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Escribe tu correo"/>
            </div>

            <div class="relative mt-4">
                <x-label for="password" value="{{ __('Password') }}" style="display:none"/>
                <span class="absolute inset-y-0 left-0 flex items-center pl-3" style="padding: 13px;">
                    <i class="fas fa-lock text-gris-400"></i>
                </span>
                <x-input style="font-family:Poppins, sans-serif;font-size:14px; padding-left: 2.5rem;" id="password" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block mt-1 w-full pl-10" type="password" name="password" required autocomplete="current-password" placeholder="Escribe tu contraseña"/>
            </div>

            <div class="block mt-4" style="display:none;">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            
            <div class="block mt-4 mx-auto">
                <x-button style="font-family:Poppins, sans-serif;font-weight:900;" class="flex w-full justify-center bg-verde-600 rounded-md text-white" >
                    {{ __('Iniciar Sesión') }}
                </x-button>
            </div>


            <div class="flex items-center justify-center mt-4">
                @if (Route::has('password.request'))
                    <div class="text-center">
                        <a class="text-sm text-gris-400 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-verde-500 text-no-underline" href="{{ route('password.request') }}">
                            {{ __('No puede iniciar sesión?') }}
                        </a>
                    </div>
                @endif
            </div>
            <div class="flex items-center justify-center mt-2">
                <div class="text-center">
                    <a class="border-0-0 text-sm text-gris-400 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-verde-500 text-no-underline" href="{{ route('register') }}">
                        {{ __('Crear cuenta') }}
                    </a>
                </div>
            </div>
            
            <div class="block mt-4 mx-auto">
                <a href="{{ route('auth.google') }}" type="button" style="font-family:Poppins, sans-serif;font-size:14px;font-weight:600;" class="custom-button">
                    <i class="fab fa-google mr-2"></i>
                    {{ __('Iniciar Sesión con Google') }}
            </a>
            </div>

        </form>
    </x-authentication-card>
</x-guest-layout>
