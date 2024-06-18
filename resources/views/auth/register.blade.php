<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>
        <div id="primero" class="w-1/2 flex flex-col items-center justify-center bg-white">
            <h1 class="mb-1" style="font-family:Poppins, sans-serif;font-size:26px;font-weight:900;">{{ __('Hola!') }}</h1>
            <p class="mb-6" style="font-size:18px;">{{ __('Registra tu empresa para empezar') }}</p>
        </div>
        <div id="segundo" style="display:none;">
            <h1 class="mb-1" style="font-family:Poppins, sans-serif;font-size:26px;font-weight:900;">{{ __('Bienvenido ZPrevia!') }}</h1>
            <p style="font-size:18px;">{{ __('Ahora completemos tu perfil') }}</p>
        </div>
        <x-validation-errors class="mb-4" />

        <div id="custom-errors" class="mb-4"></div>

        <form id="multi-step-form" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Paso 1 -->
            <div id="step-1">
                <div class="relative">
                    <x-label for="name" value="{{ __('Name') }}" style="display:none"/>
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3" style="padding: 13px;">
                        <i class="fa-solid fa-user text-gris-400"></i>
                    </span>
                    <x-input style="font-family:Poppins, sans-serif;font-size:14px; padding-left: 2.5rem;" id="name_company" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block mt-1 w-full pl-10" type="text" name="name_company" :value="old('name_company')" required autofocus autocomplete="name_company" placeholder="Nombre de la Empresa"/>
                </div>

                <div class="relative my-4">
                    <x-label for="email" value="{{ __('Email') }}" style="display:none"/>
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3" style="padding: 13px;">
                        <i class="fa-regular fa-envelope text-gris-400"></i>
                    </span>
                    <x-input style="font-family:Poppins, sans-serif;font-size:14px; padding-left: 2.5rem;" id="email" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block mt-1 w-full pl-10" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Email"/>
                </div>

                <div class="relative mt-4">
                    <x-label for="password" value="{{ __('Password') }}" style="display:none"/>
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3" style="padding: 13px;">
                        <i class="fas fa-lock text-gris-400"></i>
                    </span>
                    <x-input style="font-family:Poppins, sans-serif;font-size:14px; padding-left: 2.5rem;" id="password" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block mt-1 w-full pl-10" type="password" name="password" required autocomplete="current-password" placeholder="Contraseña"/>
                </div>

                <div class="relative mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" style="display:none" />
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3" style="padding: 13px;">
                        <i class="fas fa-lock text-gris-400"></i>
                    </span>
                    <x-input style="font-family:Poppins, sans-serif;font-size:14px; padding-left: 2.5rem;" id="password_confirmation" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block mt-1 w-full pl-10" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña"/>
                </div>

                <div class="block mt-4 mx-auto">
                    <x-button id="next-step" style="font-family:Poppins, sans-serif;font-weight:900;" class="flex w-full justify-center bg-verde-600 rounded-md text-white">
                        {{ __('Registrarme') }}
                    </x-button>
                </div>
                <div class="flex items-center justify-center mt-2">
                    <div class="text-center">
                        <a class="border-0-0 text-sm text-gris-400 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-verde-500 text-no-underline" href="{{ route('login') }}">
                            {{ __('Iniciar Sesión') }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Paso 2 -->
            <div id="step-2" style="display:none;">
                <!-- Aquí agregas los campos adicionales -->
                <div class="mt-4">
                    <x-label for="additional_info" value="{{ __('Additional Info') }}" style="display:none" />
                    <x-input style="font-family:Poppins, sans-serif;font-size:14px;" id="additional_info" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block w-full" type="text" name="cif" required placeholder="CIF"/>
                </div>
                <div class="mt-4">
                    <x-label for="additional_info" value="{{ __('Additional Info') }}" style="display:none" />
                    <x-input style="font-family:Poppins, sans-serif;font-size:14px;" id="additional_info" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block w-full" type="text" name="sector" required placeholder="Sector"/>
                </div>
                <div class="mt-4">
                    <x-label for="additional_info" value="{{ __('Additional Info') }}" style="display:none" />
                    <x-input style="font-family:Poppins, sans-serif;font-size:14px;" id="additional_info" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block w-full" type="text" name="address" required placeholder="Dirección"/>
                </div>
                <div class="mt-4">
                    <x-label for="additional_info" value="{{ __('Additional Info') }}" style="display:none" />
                    <x-input style="font-family:Poppins, sans-serif;font-size:14px;" id="additional_info" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block w-full" type="text" name="locality" required placeholder="Localidad"/>
                </div>
                <div class="mt-4">
                    <x-label for="additional_info" value="{{ __('Additional Info') }}" style="display:none" />
                    <x-input style="font-family:Poppins, sans-serif;font-size:14px;" id="additional_info" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block w-full" type="text" name="province" required placeholder="Provincia"/>
                </div>
                <div class="mt-4">
                    <x-label for="additional_info" value="{{ __('Additional Info') }}" style="display:none" />
                    <x-input style="font-family:Poppins, sans-serif;font-size:14px;" id="additional_info" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block w-full" type="text" name="dni" required placeholder="DNI"/>
                </div>
                <div class="mt-4">
                    <x-label for="additional_info" value="{{ __('Additional Info') }}" style="display:none" />
                    <x-input style="font-family:Poppins, sans-serif;font-size:14px;" id="additional_info" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block w-full" type="text" name="telefono" required placeholder="Telefono"/>
                </div>
                <div class="mt-4">
                    <x-label for="additional_info" value="{{ __('Additional Info') }}" style="display:none" />
                    <x-input style="font-family:Poppins, sans-serif;font-size:14px;" id="additional_info" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block w-full" type="text" name="name" required placeholder="Nombre del representante"/>
                </div>
                <div class="mt-4">
                    <x-label for="additional_info" value="{{ __('Additional Info') }}" style="display:none" />
                    <x-input style="font-family:Poppins, sans-serif;font-size:14px;" id="additional_info" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block w-full" type="text" name="rol_en_empresa" required placeholder="Rol en la Empresa"/>
                </div>
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2 text-xs">
                                Aceptar las politicas de privacidad.
                            </div>
                        </div>
                    </x-label>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />
                                <div class="ms-2">
                                    {!! __('Aceptar :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('politica de privacidad').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="block mt-4 mx-auto">
                    <x-button style="font-family:Poppins, sans-serif;font-weight:900;" class="flex w-full justify-center bg-verde-600 rounded-md text-white">
                        {{ __('Finalizar') }}
                    </x-button>
                </div>
                <div class="flex items-center justify-center mt-2">
                    <div class="text-center">
                        <a class="border-0-0 text-sm text-gris-400 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-verde-500 text-no-underline" href="{{ route('login') }}">
                            {{ __('Cancelar') }}
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nextStepButton = document.getElementById('next-step');
        const step1 = document.getElementById('step-1');
        const step2 = document.getElementById('step-2');
        const titulo1 = document.getElementById('primero');
        const titulo2 = document.getElementById('segundo');
        const password = document.getElementById('password');
        const passwordConfirmation = document.getElementById('password_confirmation');
        const customErrors = document.getElementById('custom-errors');

        nextStepButton.addEventListener('click', function (event) {
            customErrors.innerHTML = ''; // Limpiar errores previos

            if (password.value !== passwordConfirmation.value) {
                event.preventDefault();
                customErrors.innerHTML = `
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">Las contraseñas no coinciden. Por favor, verifica y vuelve a intentarlo.</span>
                    </div>
                `;
            } else {
                step1.style.display = 'none';
                step2.style.display = 'block';
                titulo1.style.display = 'none';
                titulo2.style.display = 'block';
            }
        });
    });
</script>

