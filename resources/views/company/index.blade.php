<x-app-layout>
    <div class="py-5">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-6 rounded-lg shadow-lg max-w-7xl mx-auto">
                    <!--<button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                        Primary
                    </button>
                    <x-input-emp  label="Op" class="mb-4" />>-->
                    @foreach ($company as $company)
                        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h1 class="text-xl font-bold">Datos de Empresa</h1>
                                <div class="flex items-center flex-col">
                                    <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden" style="width: 250px;">
                                        <div class="bg-green-500 h-full" style="width: 80%;"></div>
                                    </div>
                                    <span class="text-black mt-2">80% completo</span>
                                </div>
                            </div>
                        </div>
                        <!--Cabecera--> 
                        <div class="flex min-h-screen">
                            <div class="w-7/10">
                                <div class="grid grid-cols-2 gap-6 mt-6 ">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center">
                                            <img src="{{$company->logo}}" alt="Logo de Empresa" class="mr-2 rounded-full">
                                            <h2 class="text-xl font-semibold">{{$company->name}}</h2>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between mb-4"><div></div></div>
                                    <!-- Detalles de la empresa -->
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <div class="flex flex-col sm:col-span-2">
                                            <label for="name" class="text-sm font-medium leading-6 text-gray-900">Nombre de la Empresa</label>
                                            <x-input_empresa id="name" type="text"
                                                autocomplete="name"
                                                placeholder="{{$company->name}}"
                                                value="{{$company->name}}"
                                                x-ref="name"
                                                wire:model="name"
                                                wire:keydown.enter="edit_company" />
                                            <x-input-error for="name" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <div class="flex flex-col sm:col-span-2">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Email</dt>
                                            <x-input_empresa type="email" class="mt-1 block w-3/4"
                                                autocomplete="email"
                                                placeholder="{{$company->email}}"
                                                value="{{$company->email}}"
                                                x-ref="email"
                                                wire:model="email"
                                                wire:keydown.enter="edit_company" />
                                            <x-input-error for="email" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <div class="flex flex-col sm:col-span-2">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Teléfono</dt>
                                            <x-input_empresa type="text" class="mt-1 block w-3/4"
                                                autocomplete="telephone"
                                                placeholder="{{$company->telephone}}"
                                                value="{{$company->telephone}}"
                                                x-ref="telephone"
                                                wire:model="telephone"
                                                wire:keydown.enter="edit_company" />
                                            <x-input-error for="telephone" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <div class="flex flex-col sm:col-span-2">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">CIF</dt>
                                            <x-input_empresa type="text" class="mt-1 block w-3/4"
                                                autocomplete="cif"
                                                placeholder="{{$company->cif}}"
                                                value="{{$company->cif}}"
                                                x-ref="cif"
                                                wire:model="cif"
                                                wire:keydown.enter="edit_company" />
                                            <x-input-error for="cif" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <div class="flex flex-col sm:col-span-2">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Dirección</dt>
                                            <x-input_empresa type="text" class="mt-1 block w-3/4"
                                                autocomplete="address"
                                                placeholder="{{$company->address}}"
                                                value="{{$company->address}}"
                                                x-ref="address"
                                                wire:model="address"
                                                wire:keydown.enter="edit_company" />
                                            <x-input-error for="address" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <div class="flex flex-col sm:col-span-2">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Localidad</dt>
                                            <x-input_empresa type="text" class="mt-1 block w-3/4"
                                                autocomplete="locality"
                                                placeholder="{{$company->locality}}"
                                                value="{{$company->locality}}"
                                                x-ref="locality"
                                                wire:model="locality"
                                                wire:keydown.enter="edit_company" />
                                            <x-input-error for="locality" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <div class="flex flex-col sm:col-span-2">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Provincia</dt>
                                            <x-input_empresa type="text" class="mt-1 block w-3/4"
                                                autocomplete="province"
                                                placeholder="{{$company->province}}"
                                                value="{{$company->province}}"
                                                x-ref="province"
                                                wire:model="province"
                                                wire:keydown.enter="edit_company" />
                                            <x-input-error for="province" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <div class="flex flex-col sm:col-span-2">
                                            <dt class="text-sm font-medium leading-6 text-gray-900">Sector</dt>
                                            <x-input_empresa type="text" class="mt-1 block w-3/4"
                                                autocomplete="sector"
                                                placeholder="{{$company->sector}}"
                                                value="{{$company->sector}}"
                                                x-ref="sector"
                                                wire:model="sector"
                                                wire:keydown.enter="edit_company" />
                                            <x-input-error for="sector" class="mt-2" />
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Logotipo</label>
                                        <div class="flex items-center justify-center w-full">
                                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 gray:border-gray-600 gray:hover:border-gray-500 gray:hover:bg-gray-600">
                                                <div class="flex items-center justify-center pt-2 pb-2">
                                                    <p class="mr-2 mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">Seleccionar Archivo</span>
                                                    </p>
                                                    <x-icon_update/>
                                                </div>
                                                <input id="dropzone-file" type="file" class="hidden" />
                                            </label>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Portafolio</label>
                                        <div class="flex items-center justify-center w-full">
                                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 gray:border-gray-600 gray:hover:border-gray-500 gray:hover:bg-gray-600">
                                                <div class="flex items-center justify-center pt-2 pb-2">
                                                    <p class="mr-2 mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">Seleccionar Archivo</span>
                                                    </p>
                                                    <x-icon_update/>
                                                </div>
                                                <input id="dropzone-file" type="file" class="hidden" />
                                            </label>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Video</label>
                                        <div class="flex items-center justify-center w-full">
                                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 gray:border-gray-600 gray:hover:border-gray-500 gray:hover:bg-gray-600">
                                                <div class="flex items-center justify-center pt-2 pb-2">
                                                    <p class="mr-2 mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">Seleccionar Archivo</span>
                                                    </p>
                                                    <x-icon_update/>
                                                </div>
                                                <input id="dropzone-file" type="file" class="hidden" />
                                            </label>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Portada</label>
                                        <div class="flex items-center justify-center w-full">
                                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 gray:border-gray-600 gray:hover:border-gray-500 gray:hover:bg-gray-600">
                                                <div class="flex items-center justify-center pt-2 pb-2">
                                                    <p class="mr-2 mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                        <span class="font-semibold">Seleccionar Archivo</span>
                                                    </p>
                                                    <x-icon_update/>
                                                </div>
                                                <input id="dropzone-file" type="file" class="hidden" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-3/10">
                                <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mt-6">
                                    <div class="company-info">
                                        <div class="text-right">
                                            <x-button @click="open = true" class="w-full text-center">Nuevo Representante</x-button>
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
                                                            {{$company->name}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card_eventos_img" id="banner">
                                        <div class="logo_pincipal">
                                            <div class="relative inline-block">
                                                <img src="{{$company->cover}}" alt="Icon" class="w-26 h-26 rounded-full">
                                                <button class="absolute bottom-0 right-0 bg-white rounded-full p-2 shadow-lg">
                                                    <x-icon_edilogo/>
                                                </button>
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
                    @endforeach
                </div>
            </div>
    </div>
</x-app-layout>
