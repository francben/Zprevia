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
                                <div class="flex items-center">
                                    <span class="text-black mr-2">0% completo</span>
                                    <div class="w-full h-2 bg-gray-200 rounded-full overflow-hidden" style="width: 150px;">
                                        <div class="bg-green-500 h-full" style="width: 80%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Cabecera--> 
                        <div class="flex">
                            <div class="flex-1 p-4">
                                <div class="grid grid-cols-2 gap-6 mt-6 ">
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center">
                                            <img src="https://via.placeholder.com/50" alt="Logo de Empresa" class="mr-2">
                                            <h2 class="text-xl font-semibold">{{$company->name}}</h2>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between mb-4"><div></div></div>
                                    <!-- Detalles de la empresa -->
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Nombre de la Empresa</dt>
                                        <x-input type="text" class="mt-1 block w-3/4"
                                            autocomplete="name"
                                            placeholder="{{$company->name}}"
                                            value="{{$company->name}}"
                                            x-ref="name"
                                            wire:model="name"
                                            wire:keydown.enter="edit_company" />
                                        <x-input-error for="name" class="mt-2" />
                                    </div>
                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Email</dt>
                                        <x-input-emp  label="Label" class="mb-4" />
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Teléfono</dt>
                                        <x-input type="text" class="mt-1 block w-3/4"
                                            autocomplete="telephone"
                                            placeholder="{{$company->telephone}}"
                                            value="{{$company->telephone}}"
                                            x-ref="telephone"
                                            wire:model="telephone"
                                            wire:keydown.enter="edit_company" />
                                        <x-input-error for="telephone" class="mt-2" />
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">CIF</dt>
                                        <x-input type="text" class="mt-1 block w-3/4"
                                            autocomplete="cif"
                                            placeholder="{{$company->cif}}"
                                            value="{{$company->cif}}"
                                            x-ref="cif"
                                            wire:model="cif"
                                            wire:keydown.enter="edit_company" />
                                        <x-input-error for="cif" class="mt-2" />
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Dirección</dt>
                                        <x-input type="text" class="mt-1 block w-3/4"
                                            autocomplete="address"
                                            placeholder="{{$company->address}}"
                                            value="{{$company->address}}"
                                            x-ref="address"
                                            wire:model="address"
                                            wire:keydown.enter="edit_company" />
                                        <x-input-error for="address" class="mt-2" />
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Localidad</dt>
                                        <x-input type="text" class="mt-1 block w-3/4"
                                            autocomplete="locality"
                                            placeholder="{{$company->locality}}"
                                            value="{{$company->locality}}"
                                            x-ref="locality"
                                            wire:model="locality"
                                            wire:keydown.enter="edit_company" />
                                        <x-input-error for="locality" class="mt-2" />
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Provincia</dt>
                                        <x-input type="text" class="mt-1 block w-3/4"
                                            autocomplete="province"
                                            placeholder="{{$company->province}}"
                                            value="{{$company->province}}"
                                            x-ref="province"
                                            wire:model="province"
                                            wire:keydown.enter="edit_company" />
                                        <x-input-error for="province" class="mt-2" />
                                    </div>

                                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Sector</dt>
                                        <x-input type="text" class="mt-1 block w-3/4"
                                            autocomplete="sector"
                                            placeholder="{{$company->sector}}"
                                            value="{{$company->sector}}"
                                            x-ref="sector"
                                            wire:model="sector"
                                            wire:keydown.enter="edit_company" />
                                        <x-input-error for="sector" class="mt-2" />
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Logotipo</label>
                                        <div class="flex items-center justify-center w-full">
                                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ligth:hover:bg-bray-800 ligth:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Seleccionar Archivo</span></p>
                                                </div>
                                                <input id="dropzone-file" type="file" class="hidden" />
                                            </label>
                                        </div> 
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Portafolio</label>
                                        <div class="flex items-center justify-center w-full">
                                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ligth:hover:bg-bray-800 ligth:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Seleccionar Archivo</span></p>
                                                </div>
                                                <input id="dropzone-file" type="file" class="hidden" />
                                            </label>
                                        </div> 
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Video</label>
                                        <div class="flex items-center justify-center w-full">
                                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ligth:hover:bg-bray-800 ligth:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Seleccionar Archivo</span></p>
                                                </div>
                                                <input id="dropzone-file" type="file" class="hidden" />
                                            </label>
                                        </div> 
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Portada</label>
                                        <div class="flex items-center justify-center w-full">
                                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ligth:hover:bg-bray-800 ligth:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                    </svg>
                                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Seleccionar Archivo</span></p>
                                                </div>
                                                <input id="dropzone-file" type="file" class="hidden" />
                                            </label>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="w-35 p-4">
                                <div class="grid grid-cols-1 md:grid-cols-1 gap-6 mt-6">
                                    <div class="company-info">
                                        <div class="text-right">
                                            <x-button @click="open = true">Nuevo Representante</x-button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card_eventos sm:rounded-lg ">
                                    <div class="card_eventos_wrapper">
                                            <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                                                <div class="card_eventos_container flex items-center justify-between">
                                                    <div class="card_eventos_left flex items-center">
                                                        <div class="ml-4">
                                                            <div class="card_eventos_details flex flex-col eventos-title items-center">
                                                                <p id="name">{{$company->name}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card_eventos_img" id="banner">
                                        <div class="logo_pincipal">
                                            <svg width="127" height="43" viewBox="0 0 117 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_615_12468)">
                                            <path d="M26.2335 27H0.672688C0.520356 26.7023 0.30062 26.4736 0 26.3248V25.3803C0.0593152 25.4832 0.128067 25.4764 0.202211 25.3979C2.71771 22.7445 5.33567 20.1938 7.92262 17.6135C9.28687 16.2536 10.6269 14.8694 11.979 13.4973C12.9995 12.4825 14.02 11.4676 15.0404 10.4528C17.0356 8.41095 19.0307 6.37045 21.0178 4.33808C21.0232 4.34078 20.9895 4.3056 20.9544 4.3056C16.952 4.30966 12.9509 4.31508 8.9485 4.32184C7.19601 4.3259 5.44352 4.32861 3.69102 4.33267C3.61149 2.87266 3.27447 1.39235 4.03613 0H29.3273C29.4837 0.293625 29.6967 0.529067 30 0.675203V1.61968C29.601 1.62373 29.4985 2.00531 29.2828 2.22046C25.6767 5.80891 22.0841 9.41225 18.4915 13.0142C18.319 13.1861 18.1693 13.3809 18.0102 13.565C16.9345 14.4972 15.9747 15.5486 14.9784 16.5607C12.9846 18.5891 10.9922 20.616 8.98086 22.6619H21.0919C22.9415 22.6633 24.7911 22.666 26.642 22.6673C26.735 24.1328 27.1488 25.6293 26.2348 26.9986L26.2335 27Z" fill="#252525"/>
                                            <path d="M18.0103 13.5649C19.5337 15.075 21.0597 16.5837 22.5789 18.0979C23.6722 19.1871 24.7561 20.2845 25.848 21.3751C26.2174 21.7432 26.5248 22.145 26.6407 22.6687C24.7911 22.6673 22.9416 22.6646 21.092 22.6633C19.996 21.5497 18.9095 20.4252 17.8 19.3251C16.8645 18.3996 15.9909 17.4091 14.9785 16.5621C15.9747 15.5486 16.9346 14.4986 18.0103 13.5663V13.5649Z" fill="#01A69C"/>
                                            <path d="M11.9802 13.4959C9.60491 11.1077 7.23365 8.71539 4.8543 6.33121C4.28946 5.76426 3.8082 5.15806 3.69092 4.33266C5.44341 4.3286 7.19591 4.3259 8.94975 4.32184C9.67906 5.26225 10.5742 6.043 11.4113 6.87922C12.6125 8.07808 13.7529 9.34188 15.0417 10.4528C14.0212 11.4676 13.0007 12.4825 11.9802 13.4973V13.4959Z" fill="#01A69C"/>
                                            </g>
                                            <path d="M101.641 21.8906C101.641 18.6302 104.016 17 108.766 17C109.88 17 110.995 17.1042 112.109 17.3125V16.0781C112.109 14.6094 111.052 13.875 108.938 13.875C107.146 13.875 105.156 14.1354 102.969 14.6562V11.375C105.156 10.8542 107.146 10.5938 108.938 10.5938C113.812 10.5938 116.25 12.3958 116.25 16V27H113.844L112.375 25.5312C110.948 26.5104 109.375 27 107.656 27C103.646 27 101.641 25.2969 101.641 21.8906ZM112.109 20.125C111.068 19.9167 109.953 19.8125 108.766 19.8125C106.776 19.8125 105.781 20.4896 105.781 21.8438C105.781 23.3021 106.615 24.0312 108.281 24.0312C109.656 24.0312 110.932 23.6042 112.109 22.75V20.125Z" fill="#252525"/>
                                            <path d="M98.5 4.65625V7.9375H94.3594V4.65625H98.5ZM98.5 10.5938V27H94.3594V10.5938H98.5Z" fill="#252525"/>
                                            <path d="M75.5312 10.5938H79.9062L83.8906 22.0625L88.0312 10.5938H92.4062L85.7344 27H81.7969L75.5312 10.5938Z" fill="#252525"/>
                                            <path d="M66.9062 10.5938C71.8854 10.5938 74.375 13.1354 74.375 18.2188C74.375 18.8958 74.3281 19.5729 74.2344 20.25H63.3438C63.3438 22.5625 65.0417 23.7188 68.4375 23.7188C70.0938 23.7188 71.75 23.5625 73.4062 23.25V26.5312C71.9583 26.8438 70.1979 27 68.125 27C62.1771 27 59.2031 24.2031 59.2031 18.6094C59.2031 13.2656 61.7708 10.5938 66.9062 10.5938ZM63.3438 17.375H70.3438V17.25C70.3438 14.9792 69.1979 13.8438 66.9062 13.8438C64.7188 13.8438 63.5312 15.0208 63.3438 17.375Z" fill="#252525"/>
                                            <path d="M49.3594 27V10.5938H52.5625L53.0781 12.6875C54.5156 11.2917 56.0365 10.5938 57.6406 10.5938V13.9375C56.099 13.9375 54.7188 14.5781 53.5 15.8594V27H49.3594Z" fill="#252525"/>
                                            <path d="M35.0938 22.7188C36.125 23.2812 37.2344 23.5625 38.4219 23.5625C40.8906 23.5625 42.125 21.8281 42.125 18.3594C42.125 15.4115 40.7604 13.9375 38.0312 13.9375C36.8542 13.9375 35.875 14.0104 35.0938 14.1562V22.7188ZM30.9531 11.2656C33.1302 10.8177 35.4323 10.5938 37.8594 10.5938C43.4323 10.5938 46.2188 13.1927 46.2188 18.3906C46.2188 24.1302 43.625 27 38.4375 27C37.3333 27 36.2188 26.7396 35.0938 26.2188V32.9375H30.9531V11.2656Z" fill="#252525"/>
                                            <defs>
                                            <clipPath id="clip0_615_12468">
                                            <rect width="30" height="27" fill="white"/>
                                            </clipPath>
                                            </defs>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="card_eventos_wrapper">
                                        <div class="card_eventos_container flex items-center justify-between">
                                            <div class="card_eventos_container flex flex-col items-start space-y-2">
                                                <x-button @click="open = true">Button 1</x-button>
                                                <x-button @click="open = true">Button 2</x-button>
                                                <x-button @click="open = true">Button 3</x-button>
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
