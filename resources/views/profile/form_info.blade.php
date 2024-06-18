<x-app-layout>
    <div class="py-5">
        <div class="max-w-auto mx-auto sm:px-6">
            <div class="mt-6 bg-white " style="height:75vh">
                <div x-data="{photoName: null, photoPreview: null}" class="bg-white p-6 rounded-lg shadow-md">
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
                    <div class="bg-white pl-8 p-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h1 class="text-xl font-semibold">Datos de Usuario</h1>
                        </div>
                    </div>
                    <div class="flex pl-8 p-1 items-center space-x-4 mt-2">
                        <div x-show="!photoPreview">
                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="rounded-full h-10 w-10 object-cover">
                        </div>
                        <p class="text-sm font-medium">{{ $user->name }}</p>
                    </div>
                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                        <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                            x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>
                    <x-input-error for="photo" class="mt-2" />
                    <div class="max-w-6xl mx-auto pl-9 p-4">
                        <form action="{{ route('company.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf 
                            <div class="grid grid-cols-10 gap-6">
                                <div class="col-span-7">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                        <div class="col-span-1">
                                            <x-label class="text-xs text-gray-400" for="name" value="Nombre" />
                                            <x-input_empresa type="text" class="mt-1 block w-3/4 text-sm pl-0 focus:pl-2"
                                                name="name"
                                                autocomplete="name"
                                                placeholder="{{$user->delegate->name}}"
                                                value="{{$user->delegate->name}}"
                                                required />
                                            <x-input-error for="name" class="mt-2" />
                                        </div>
                                        <div class="col-span-1">
                                            <x-label class="text-xs" for="email" value="Email" />
                                            <x-input_empresa type="email" class="mt-1 block w-3/4 text-sm pl-0 focus:pl-2"
                                                name="email"
                                                autocomplete="email"
                                                placeholder="{{$user->email}}"
                                                value="{{$user->email}}"
                                                required />
                                            <x-input-error for="email" class="mt-2" />
                                        </div>
                                        <div class="col-span-1">
                                            <x-label class="text-xs" for="telephone" value="Teléfono" />
                                            <x-input_empresa type="text" class="mt-1 block w-3/4 text-sm pl-0 focus:pl-2"
                                                name="telephone"
                                                autocomplete="telephone"
                                                placeholder="Numero de telefono"
                                                value="{{$user->delegate->telephone}}"
                                                required />
                                            <x-input-error for="telephone" class="mt-2" />
                                        </div>
                                        <div class="col-span-1">
                                            <x-label class="text-xs" for="dni" value="DNI" />
                                            <x-input_empresa type="text" class="mt-1 block w-3/4 text-sm pl-0 focus:pl-2"
                                                name="dni"
                                                autocomplete="dni"
                                                placeholder="{{$company->dni}}"
                                                value="{{$company->dni}}"
                                                required />
                                            <x-input-error for="dni" class="mt-2" />
                                        </div>
                                        <div class="col-span-1">
                                            <x-label class="text-xs" for="rol_en_empresa" value="Rol en la Empresa" />
                                            <x-input_empresa type="text" class="mt-1 block w-3/4 text-sm pl-0 focus:pl-2"
                                                name="rol_en_empresa"
                                                autocomplete="rol_en_empresa"
                                                placeholder="{{$company->rol_en_empresa}}"
                                                value="{{$user->delegate->position}}"
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
                                                <div class="flex">
                                                    <x-label for="photo" value="Imagen de perfil" class="text-xs mb-2" /><p class="pl-2 text-xs text-gray-400">max. 4MB</p>
                                                </div>
                                                <div class="mt-2" x-show="photoPreview" style="display: none;">
                                                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                                                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                                    </span>
                                                </div>
                                                <x-secondary-button class="me-2 text-xs" type="button" x-on:click.prevent="$refs.photo.click()">
                                                    {{ __('Seleccionar imagen') }}
                                                </x-secondary-button>
                                                <x-input-error for="photo" class="mt-2" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- Segundo div que consume el 30% -->
                                <div class="col-span-3 content-start sm:rounded-lg" style="justify-content: space-around !important;">
                                    <!-- Card -->
                                    <div class="bg-white p-6 rounded-lg shadow-md ">
                                        <div class="p-2 border-b border-gray-200">
                                            <div class="flex justify-center">
                                                <div class="text-xl text-gray-800 font-semibold">
                                                    <p>{{ $user->name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="banner" class="flex justify-center mt-4">
                                            <div class="relative inline-block">
                                                <div x-data="{ photoName: null, photoPreview: null }" class="relative">
                                                    <div x-show="!photoPreview" class="mx-auto">
                                                        <img src="{{ $user->profile_photo_url }}" alt="{{ $user->delegate->name }}" class="max-w-[100px] max-h-[100px] rounded-full object-cover">
                                                        <!-- Ícono de verificación en la parte inferior derecha -->
                                                        <span class="absolute bottom-0 right-0 bg-white rounded-full p-1 shadow-lg">
                                                            <x-icon_check />
                                                        </span>
                                                    </div>
                                                    <!-- Previsualización de la nueva foto -->
                                                    <div x-show="photoPreview" class="relative w-32 h-32 mx-auto">
                                                        <span class="block rounded-full w-32 h-32 bg-cover bg-no-repeat bg-center"
                                                            x-bind:style="'background-image: url(' + photoPreview + '); object-fit: cover;'">
                                                        </span>
                                                        <!-- Ícono de verificación en la parte inferior derecha -->
                                                        <button class="absolute bottom-0 right-0 bg-white rounded-full p-1 shadow-lg">
                                                            <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd"
                                                                    d="M16.707 6.707a1 1 0 01-1.414 0L9 1.414 4.707 5.707a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0l7 7a1 1 0 010 1.414z"
                                                                    clip-rule="evenodd" />
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-6">
                                <x-button_gray type="submit" class="w-full bg-gray-600 ">
                                    {{ __('Actualizar') }}
                                </x-button_gray>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
