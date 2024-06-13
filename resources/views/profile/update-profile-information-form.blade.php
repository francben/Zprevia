<x-perfil_info submit="updateProfileInformation">
    <x-slot name="title">
    </x-slot>

    <x-slot name="description">
       
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
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
                <x-label for="photo" value="{{ $this->user->name }}" class="mb-2" />

                <!-- Container for profile photo and name -->
                <div class="flex items-center space-x-4 mt-2">
                    <!-- Profile Photo -->
                    <div x-show="!photoPreview">
                        <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-10 w-10 object-cover">
                    </div>
                    <!-- User Name -->
                    <p class="text-lg font-medium">{{ $this->user->name }}</p>
                </div>


                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Email -->
            <div class="max-w-4xl mx-auto p-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="col-span-1">
                        <x-label for="name" value="Nombre" />
                        <x-input_empresa id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
                        <x-input-error for="name" class="mt-2" />
                    </div>
                    <div class="col-span-1">
                        <x-label for="email" value="Email" />
                        <x-input_empresa id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="username" />
                        <x-input-error for="email" class="mt-2" />
                    </div>
                    <div class="col-span-1">
                        <x-label for="telephone" value="Teléfono" />
                        <x-input_empresa id="telephone" type="text" class="mt-1 block w-full" wire:model="state.telephone" required autocomplete="telephone" />
                        <x-input-error for="telephone" class="mt-2" />
                    </div>
                    <div class="col-span-1">
                        <x-label for="cif" value="DNI" />
                        <x-input_empresa id="cif" type="text" class="mt-1 block w-full" wire:model="state.cif" required autocomplete="cif" />
                        <x-input-error for="cif" class="mt-2" />
                    </div>
                    <div class="col-span-1">
                        <x-label for="rol_en_empresa" value="Rol en la Empresa" />
                        <x-input_empresa id="rol_en_empresa" type="text" class="mt-1 block w-full" wire:model="state.rol_en_empresa" required autocomplete="rol_en_empresa" />
                        <x-input-error for="rol_en_empresa" class="mt-2" />
                    </div>
                </div>
            </div>
            <div class="card_eventos sm:rounded-lg ">
                    <div class="card_eventos_wrapper">
                        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                            <div class="card_eventos_container flex items-center justify-between">
                                <div class="card_eventos_left">
                                    <div class="">
                                        <div class=" text-center text-xl text-gray-800 font-semibold">
                                            {{$this->user->name}}                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card_eventos_img" id="banner">
                        <div class="logo_pincipal">
                            <div class="relative inline-block">
                                <img src="" alt="Icon" class="w-26 h-26 rounded-full">
                                <button class="absolute bottom-0 right-0 bg-white rounded-full p-2 shadow-lg">
                                    <x-icon_check/>
                                </button>
                            </div>
                        </div>
                    </div>                  
            </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-perfil_info>
