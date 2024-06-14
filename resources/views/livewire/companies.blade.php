<div>
<div class="py-5">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-7xl mx-auto">
                    <!--<button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                        Primary
                    </button>
                    <x-input-emp  label="Op" class="mb-4" />>-->
                        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h1 class="text-xl font-bold">Datos de Empresa</h1>
                                <div class="flex items-center flex-col">
                                    <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden" style="width: 250px;">
                                        <div class="bg-green-500 h-full" style="width:{{$percentageFilled}}%;"></div>
                                    </div>
                                    <span class="text-black mt-2">{{$percentageFilled}}% completo</span>
                                </div>
                            </div>
                        </div>
                        <!--Cabecera--> 
                        <div class="flex min-h-screen">
                            <div class="w-7/10 min-h-screen">
                            <form wire:submit.prevent="save">
                                <div class="grid grid-cols-2 gap-6 mt-6 ">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center">
                                            <img src="{{asset('storage/' . $logo)}}" alt="Logo de Empresa" class="rounded-full h-10 w-10 object-cover">
                                            <h2 class="text-xl font-semibold">{{$name}}</h2>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between mb-4"><div></div></div>
                                    <!-- Detalles de la empresa -->
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <div class="flex flex-col sm:col-span-2">
                                            <label for="name" class="text-sm font-medium leading-6 text-gray-900">Nombre de la Empresa</label>
                                            <x-input_empresa id="name" type="text"
                                                autocomplete="name"
                                                placeholder="{{$name}}"
                                                value="{{$name}}"
                                                x-ref="name"
                                                wire:change="save"
                                                wire:model.lazy="name" />
                                            <x-input-error for="name" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <div class="flex flex-col sm:col-span-2">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Email</dt>
                                            <x-input_empresa type="email" class="mt-1 block w-3/4"
                                                autocomplete="email"
                                                placeholder="{{$email}}"
                                                value="{{$email}}"
                                                x-ref="email"
                                                wire:change="save"
                                                wire:model.lazy="email" />
                                            <x-input-error for="email" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <div class="flex flex-col sm:col-span-2">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Teléfono</dt>
                                            <x-input_empresa type="text" class="mt-1 block w-3/4"
                                                autocomplete="telephone"
                                                placeholder="{{$telephone}}"
                                                value="{{$telephone}}"
                                                x-ref="telephone"
                                                wire:change="save"
                                                wire:model.lazy="telephone" />
                                            <x-input-error for="telephone" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <div class="flex flex-col sm:col-span-2">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">CIF</dt>
                                            <x-input_empresa type="text" class="mt-1 block w-3/4"
                                                autocomplete="cif"
                                                placeholder="{{$cif}}"
                                                value="{{$cif}}"
                                                x-ref="cif"
                                                wire:change="save"
                                                wire:model.lazy="cif" />
                                            <x-input-error for="cif" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <div class="flex flex-col sm:col-span-2">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Dirección</dt>
                                            <x-input_empresa type="text" class="mt-1 block w-3/4"
                                                autocomplete="address"
                                                placeholder="{{$address}}"
                                                value="{{$address}}"
                                                x-ref="address"
                                                wire:change="save"
                                                wire:model.lazy="address" />
                                            <x-input-error for="address" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <div class="flex flex-col sm:col-span-2">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Localidad</dt>
                                            <x-input_empresa type="text" class="mt-1 block w-3/4"
                                                autocomplete="locality"
                                                placeholder="{{$locality}}"
                                                value="{{$locality}}"
                                                x-ref="locality"
                                                wire:change="save"
                                                wire:model.lazy="locality" />
                                            <x-input-error for="locality" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <div class="flex flex-col sm:col-span-2">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Provincia</dt>
                                            <x-input_empresa type="text" class="mt-1 block w-3/4"
                                                autocomplete="province"
                                                placeholder="{{$province}}"
                                                value="{{$province}}"
                                                x-ref="province"
                                                wire:change="save"
                                                wire:model.lazy="province" />
                                            <x-input-error for="province" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <div class="flex flex-col sm:col-span-2">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Sector</dt>
                                            <x-input_empresa type="text" class="mt-1 block w-3/4"
                                                autocomplete="sector"
                                                placeholder="{{$sector}}"
                                                value="{{$sector}}"
                                                x-ref="sector"
                                                wire:change="save"
                                                wire:model.lazy="sector" />
                                            <x-input-error for="sector" class="mt-2" />
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Logotipo</label>
                                        <div class="flex items-center justify-center w-full">
                                            <label for="logoFile" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 gray:border-gray-600 gray:hover:border-gray-500 gray:hover:bg-gray-600">
                                                <div class="flex items-center justify-center pt-2 pb-2">
                                                    <p class="mr-2 mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">Seleccionar Archivo</span>
                                                    </p>
                                                    <x-icon_update/>
                                                </div>
                                                <input id="logoFile" type="file" class="hidden" wire:model="logoFile" accept="image/*" />
                                                </label>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Portafolio</label>
                                        <div class="flex items-center justify-center w-full">
                                            <label for="portfolioFile" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 gray:border-gray-600 gray:hover:border-gray-500 gray:hover:bg-gray-600">
                                                <div class="flex items-center justify-center pt-2 pb-2">
                                                    <p class="mr-2 mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">Seleccionar Archivo</span>
                                                    </p>
                                                    <x-icon_update/>
                                                </div>
                                                <input id="portfolioFile" type="file" class="hidden" wire:model="portfolioFile" />
                                            </label>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Video</label>
                                        <div class="flex items-center justify-center w-full">
                                            <label for="videoFile" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 gray:border-gray-600 gray:hover:border-gray-500 gray:hover:bg-gray-600">
                                                <div class="flex items-center justify-center pt-2 pb-2">
                                                    <p class="mr-2 mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">Seleccionar Archivo</span>
                                                    </p>
                                                    <x-icon_update/>
                                                </div>
                                                <input id="videoFile" type="file" class="hidden" wire:model="videoFile" />
                                            </label>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Portada</label>
                                        <div class="flex items-center justify-center w-full">
                                            <label for="coverFile" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 gray:border-gray-600 gray:hover:border-gray-500 gray:hover:bg-gray-600">
                                                <div class="flex items-center justify-center pt-2 pb-2">
                                                    <p class="mr-2 mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">Seleccionar Archivo</span>
                                                    </p>
                                                    <x-icon_update/>
                                                </div>
                                                <input id="coverFile" type="file" class="hidden" wire:model="coverFile" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            </div>
                            <div class=" flex-auto w-64">
                                <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mt-6">
                                    <div class="company-info">
                                        <div class="text-right">
                                            <x-button wire:click="verDetalleEvento({{$eventid}})" class="w-full text-center">Nuevo Representante</x-button>

                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card_eventos sm:rounded-lg ">
                                    <div class="card_eventos_wrapper">
                                        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                                            <div class="card_eventos_container flex items-center justify-between">
                                                <div class="card_eventos_left">
                                                    <div class="">
                                                        <div class=" text-center text-xl text-gray-800 font-semibold">
                                                            {{$name}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="" id="banner">
                                        <div class="logo_pincipal">
                                            <div class=" justify-center">
                                                <div class="flex items-center justify-between mb-4">
                                                    <div class="flex items-center">
                                                        <img src="{{ asset('storage/' . $logo) }}" alt="Icon" class="rounded-full h-14 w-14 object-cover">
                                                    </div>
                                                </div>
                                               <!-- <button class="relative bottom-10 right-0 bg-white rounded-full p-2 shadow-lg">
                                                    <x-icon_edilogo/>
                                                </button>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card_eventos_wrapper">
                                        <div class="items-right">
                                            <div class="flex flex-col items-start space-y-2">
                                                <x-button_gray @click="open = true" class="w-full">Portafolio</x-button>
                                                <x-button @click="open = true" class="w-full">Video</x-button>
                                                <x-button_gray @click="open = true" class="w-full">Portada</x-button>
                                            </div>
                                        </div>
                                    </div>                    
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <x-modal-empresa name="ver-Evento">
                <x-slot:body>
                    <div class="text-gray-900 font-semibold text-lg	 font-black mb-4">Nuevo Representante de Empresa</div>
                        <form wire:submit.prevent="crear({{ $eventid}})">
                            <div class="flex flex-col sm:col-span-2 ">
                                <dt class="text-sm font-medium leading-6 text-gray-900">DNI</dt>
                                <x-input_create type="text" class="mt-1 block w-full w-full"
                                    autocomplete=""
                                    placeholder="057000000"
                                    value=""
                                    x-ref="identificacion"
                                    wire:model="identificacion" />
                                <x-input-error for="identificacion" class="mt-2" />
                            </div>
                            <div class="flex flex-col sm:col-span-2">
                                <dt class="text-sm font-medium leading-6 text-gray-900">Nombre</dt>
                                <x-input_create type="text" class="mt-1 block flex-group w-full"
                                    autocomplete="off"
                                    placeholder="Nombre"
                                    value=""
                                    x-ref=""
                                    wire:model="nombre" />
                                <x-input-error for="nombre" class="mt-2" />
                            </div>
                            <div class="flex flex-col sm:col-span-2">
                                <dt class="text-sm font-medium leading-6 text-gray-900">Contraseña</dt>
                                <x-input_create type="password" class="mt-1 block w-full"
                                    autocomplete=""
                                    placeholder="Contraseña"
                                    value=""
                                    x-ref="pasword"
                                    wire:model="pasword" />
                                <x-input-error for="pasword" class="mt-2" />
                            </div>
                            <div class="flex flex-col sm:col-span-2">
                                <dt class="text-sm font-medium leading-6 text-gray-900">Email</dt>
                                <x-input_create type="email" class="mt-1 block w-full"
                                    autocomplete=""
                                    placeholder="Email"
                                    value=""
                                    x-ref="correo"
                                    wire:model="correo" />
                                <x-input-error for="correo" class="mt-2" />
                            </div>
                            <div class="flex flex-col sm:col-span-2">
                                <dt class="text-sm font-medium leading-6 text-gray-900">Teléfono</dt>
                                <x-input_create type="text" class="mt-1 block w-full"
                                    autocomplete=""
                                    placeholder="Teléfono"
                                    value=""
                                    x-ref="telefono"
                                    wire:model="telefono" />
                                <x-input-error for="telefono" class="mt-2" />
                            </div>
                            <div class="flex flex-col sm:col-span-2">
                                <dt class="text-sm font-medium leading-6 text-gray-900">Rol en la Empresa</dt>
                                <x-input_create type="text" class="mt-1 block w-full"
                                    autocomplete=""
                                    placeholder="Rol"
                                    value=""
                                    x-ref="rol"
                                    wire:model="rol" />
                                <x-input-error for="rol" class="mt-2" />
                            </div>
                            <br>
                            <div class="flex flex-col sm:col-span-2">
                                <x-button wire:click="crear({{$eventid}})" class="w-full text-center">Nuevo Representante</x-button>
                            </div>
                        </form>
                    </div>
                </x-slot>
        </x-modal-empresa>
    </div>
</div>
