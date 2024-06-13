<x-app-layout>
    <div class="py-5">
        <div class="max-w-auto mx-auto sm:px-6">
            <div class="flex card_eventos bg-white p-6">
            <!-- Profile Photo -->
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" id="photo" class="hidden"
                                wire:model.live="photo"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />

                    <!-- Label -->
                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h1 class="text-xl font-semibold">Datos de Usuario</h1>
                        </div>
                    </div>
                    <!-- Container for profile photo and name -->
                    <div class="flex items-center space-x-4 mt-2">
                        <!-- Profile Photo -->
                        <div x-show="!photoPreview">
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="rounded-full h-10 w-10 object-cover">
                        </div>
                        <!-- User Name -->
                        <p class="text-lg font-medium">{{ $user->name }}</p>
                </div>
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>
                
                @if ($user->profile_photo_path)
                    
                @endif
                <x-input-error for="photo" class="mt-2" />
                <div class="max-w-6xl mx-auto p-4">
                    <form action="{{ route('company.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- Token de seguridad para formularios en Laravel -->
                        <div class="grid grid-cols-10 gap-6">
                            <!-- Primer div que consume el 70% -->
                            <div class="col-span-7">
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                    <div class="col-span-1">
                                        <x-label for="name" value="Nombre" />
                                        <x-input_empresa type="text" class="mt-1 block w-3/4"
                                            name="name"
                                            autocomplete="name"
                                            placeholder="{{$user->name}}"
                                            value="{{$user->name}}"
                                            required />
                                        <x-input-error for="name" class="mt-2" />
                                    </div>
                                    <div class="col-span-1">
                                        <x-label for="email" value="Email" />
                                        <x-input_empresa type="email" class="mt-1 block w-3/4"
                                            name="email"
                                            autocomplete="email"
                                            placeholder="{{$user->email}}"
                                            value="{{$user->email}}"
                                            required />
                                        <x-input-error for="email" class="mt-2" />
                                    </div>
                                    <div class="col-span-1">
                                        <x-label for="telephone" value="Teléfono" />
                                        <x-input_empresa type="text" class="mt-1 block w-3/4"
                                            name="telephone"
                                            autocomplete="telephone"
                                            placeholder="{{$company->telephone}}"
                                            value="{{$company->telephone}}"
                                            required />
                                        <x-input-error for="telephone" class="mt-2" />
                                    </div>
                                    <div class="col-span-1">
                                        <x-label for="dni" value="DNI" />
                                        <x-input_empresa type="text" class="mt-1 block w-3/4"
                                            name="dni"
                                            autocomplete="dni"
                                            placeholder="{{$company->dni}}"
                                            value="{{$company->dni}}"
                                            required />
                                        <x-input-error for="dni" class="mt-2" />
                                    </div>
                                    <div class="col-span-1">
                                        <x-label for="rol_en_empresa" value="Rol en la Empresa" />
                                        <x-input_empresa type="text" class="mt-1 block w-3/4"
                                            name="rol_en_empresa"
                                            autocomplete="rol_en_empresa"
                                            placeholder="{{$company->rol_en_empresa}}"
                                            value="{{$company->rol_en_empresa}}"
                                            required />
                                        <x-input-error for="rol_en_empresa" class="mt-2" />
                                    </div>
                                    <div class="col-span-1">
                                        <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">
                                            <input type="file" id="photo" name="photo" class="hidden"
                                                x-ref="photo"
                                                x-on:change="
                                                        photoName = $refs.photo.files[0].name;
                                                        const reader = new FileReader();
                                                        reader.onload = (e) => {
                                                            photoPreview = e.target.result;
                                                        };
                                                        reader.readAsDataURL($refs.photo.files[0]);
                                                " />
                                            <!-- Label -->
                                            <x-label for="photo" value="Imagen de perfil" class="mb-2" />
                                            <div class="mt-2" x-show="photoPreview" style="display: none;">
                                                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                                                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                                </span>
                                            </div>
                                            <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                                                {{ __('Selecciona una imagen') }}<x-icon_update/>
                                            </x-secondary-button>
                                            
                                            <x-input-error for="photo" class="mt-2" />
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- Segundo div que consume el 30% -->
                            <div class="col-span-3 card_eventos sm:rounded-lg">
                                <div class="card_eventos_wrapper">
                                    <div class="p-2 lg:p-8 bg-white border-b border-gray-200">
                                        <div class="card_eventos_container flex items-center justify-between">
                                            <div class="card_eventos_left">
                                                <div class="text-center text-xl text-gray-800 font-semibold">
                                                    {{ $user->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card_eventos_img" id="banner">
                                    <div class="logo_principal">
                                        <div class="relative inline-block">
                                            <div class="flex items-center justify-center mt-2">
                                                <div class="relative inline-block">
                                                    <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4 relative">
                                                        <!-- Imagen de perfil actual o previsualización -->
                                                        <div x-show="!photoPreview" class="relative w-32 h-32 mx-auto">
                                                        <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="rounded-full object-cover" style="width: 100%; height: 100%; max-width: 128px; max-height: 128px; border-radius: 50%; margin: 0; padding: 0;">
                                                        <!-- Ícono de verificación en la parte inferior derecha -->
                                                            <button class="absolute bottom-0 right-0 bg-white rounded-full p-1 shadow-lg">
                                                                <x-icon_check/>
                                                            </button>
                                                            <!--<form action="{{ route('company.profiledelete') }}" method="post">
                                                                @csrf 
                                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                                <x-secondary-button type="submit" class="mt-2" wire:click="deleteProfilePhoto">
                                                                    {{ __('Eliminar Imagen') }}
                                                                </x-secondary-button>
                                                            </form>-->
                                                        </div>
                                                        <!-- Previsualización de la nueva foto -->
                                                        <div x-show="photoPreview" class="relative w-32 h-32 mx-auto">
                                                            <span class="block rounded-full w-32 h-32 bg-cover bg-no-repeat bg-center"
                                                                x-bind:style="'background-image: url(' + photoPreview + '); object-fit: cover;'">
                                                            </span>
                                                            <!-- Ícono de verificación en la parte inferior derecha -->
                                                            <button class="absolute bottom-0 right-0 bg-white rounded-full p-1 shadow-lg">
                                                                <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M16.707 6.707a1 1 0 01-1.414 0L9 1.414 4.707 5.707a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0l7 7a1 1 0 010 1.414z" clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <!-- Input para cargar una nueva foto -->
                                                        <input type="file" class="hidden" x-ref="photo" @change="
                                                            photoName = $refs.photo.files[0].name;
                                                            const reader = new FileReader();
                                                            reader.onload = (e) => {
                                                                photoPreview = e.target.result;
                                                            };
                                                            reader.readAsDataURL($refs.photo.files[0]);
                                                        ">
                                                    </div>
                                                    <br>
                                                    <div class="card_eventos_wrapper">
                                                        <div class="items-right">
                                                            <div class="flex flex-col items-start space-y-2">
                                                                <br><br><br>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-button_gray type="submit" class="w-full bg-gray-200">
                        {{ __('Guardar Cambios') }}
                    </x-button_gray>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
