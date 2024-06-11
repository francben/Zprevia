<nav x-data="{ open: false }" class="bg-white ml-1 pt-2 w-full">
    <!-- Logo -->
    <div class="max-w-7xl mx-auto px-2 flex justify-between items-center h-16">
        <div class="flex items-center">
            <a href="{{ route('eventos.index') }}">
                <x-application-mark class="block h-9 w-auto" />
            </a>
        </div>
    </div>
    <hr />
    <!-- Datos de Usuario -->
    <div class="hidden max-w-7xl mx-auto justify-between items-center h-16 mt-4 ml-4 sm:flex sm:flex-col sm:items-start ml-3 sm:space-y-4 sm:mt-4">
        <div class=" flex items-center space-x-4">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div class="rounded-full object-cover w-12 h-12">
                    <img class="h-full w-full rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>
            @else
                <div class="w-imagen">
                    <img class="h-full w-full rounded-full object-cover" src=".\assets\imagenes\avatar_Zprevia.png" alt="{{ Auth::user()->name }}" />
                </div>
            @endif
            <div>
                <div class="font-medium" style="font-family:Poppins, sans-serif;font-size:14px;font-weight:600;">{{ Auth::user()->name }}</div>
                <div class="correo_vis text-sm text-gray-400" style="font-family:'Poppins', sans-serif;font-size:10px;font-weight: 800;letter-spacing: 0.5px;">{{ Auth::user()->email }}</div>
            </div>
        </div>
    </div>

    <!-- Navigation Links -->
    <div class="max-w-7xl mx-auto px-2 flex justify-between h-16">
        <div class="hidden sm:flex sm:flex-col sm:items-start ml-3 sm:space-y-4 sm:mt-4">
            <!-- Primer Menú -->
            @php
                $isEventosActive = request()->routeIs('eventos') || request()->routeIs('eventosActivos') || request()->routeIs('eventosDisponibles') || request()->routeIs('eventosFinalizados');
            @endphp

            <div class="cursor-pointer flex justify-between items-center" id="eventosLink">
                <x-nav-link href="#" :active="$isEventosActive" class="border-b-0 letra_custom">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-current hover:stroke-gray-900">
                        <g clip-path="url(#clip0_923_425)">
                            <path d="M3.5 10.1333C3.33431 10.1333 3.2 9.99902 3.2 9.83333V3.5C3.2 3.33431 3.33431 3.2 3.5 3.2H8.16667C8.33235 3.2 8.46667 3.33431 8.46667 3.5V9.83333C8.46667 9.99902 8.33235 10.1333 8.16667 10.1333H3.5ZM3.5 16.8C3.33431 16.8 3.2 16.6657 3.2 16.5V13.5C3.2 13.3343 3.33431 13.2 3.5 13.2H8.16667C8.33235 13.2 8.46667 13.3343 8.46667 13.5V16.5C8.46667 16.6657 8.33235 16.8 8.16667 16.8H3.5ZM11.8333 16.8C11.6676 16.8 11.5333 16.6657 11.5333 16.5V10.1667C11.5333 10.001 11.6676 9.86667 11.8333 9.86667H16.5C16.6657 9.86667 16.8 10.001 16.8 10.1667V16.5C16.8 16.6657 16.6657 16.8 16.5 16.8H11.8333ZM11.5333 3.5C11.5333 3.33431 11.6676 3.2 11.8333 3.2H16.5C16.6657 3.2 16.8 3.33431 16.8 3.5V6.5C16.8 6.66569 16.6657 6.8 16.5 6.8H11.8333C11.6676 6.8 11.5333 6.66569 11.5333 6.5V3.5Z" stroke-width="1.4"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_923_425">
                                <rect width="20" height="20" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <div class="ml-3">
                        {{ __('Eventos') }}
                    </div>
                </x-nav-link>
            </div>

            <!-- Menú Acordeón -->
            <div class="{{ $isEventosActive ? 'block' : 'hidden' }} max-w-7xl mx-auto px-1 sm:px-1 lg:px-4" id="eventoContent">
                <!-- Lista de opciones del menú -->
                <ul class="mt-2">
                    <li class="mb-2">
                        <x-nav-link href="{{ route('eventosActivos') }}" :active="request()->routeIs('eventosActivos')" class="border-b-0 letra_custom "><!--{{ request()->routeIs('eventosActivos') ? 'bg-gray-200' : '' }}-->
                            <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4" r="3" stroke="#FFB946" stroke-width="2"/>
                            </svg>
                            <div class="ml-3">
                                {{ __('Activos') }}
                            </div>
                        </x-nav-link>
                    </li>
                    <li class="mb-2">
                        <x-nav-link href="{{ route('eventosDisponibles') }}" :active="request()->routeIs('eventosDisponibles')" class="border-b-0 letra_custom">
                            <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4" r="3" stroke="#2ED47A" stroke-width="2"/>
                            </svg>
                            <div class="ml-3">
                                {{ __('Disponibles') }}
                            </div>
                        </x-nav-link>
                    </li>
                    <li class="mb-2">
                        <x-nav-link href="{{ route('eventosFinalizados') }}" :active="request()->routeIs('eventosFinalizados')" class="border-b-0 letra_custom">
                            <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4" r="3" stroke="#F7685B" stroke-width="2"/>
                            </svg>
                            <div class="ml-3">
                                {{ __('Finalizados') }}
                            </div>
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        
            <x-nav-link href="{{ route('empresas') }}" :active="request()->routeIs('empresas')" class="border-b-0  letra_custom">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-current hover:stroke-gray-900">
                    <g clip-path="url(#clip0_923_419)">
                        <path d="M2.50008 3.2H16.6667C16.7385 3.2 16.8001 3.2616 16.8001 3.33333V8.33333C16.8001 8.40507 16.7385 8.46667 16.6667 8.46667H2.50008C2.42835 8.46667 2.36675 8.40507 2.36675 8.33333V3.33333C2.36675 3.2616 2.42835 3.2 2.50008 3.2ZM2.50008 11.5333H16.6667C16.7385 11.5333 16.8001 11.5949 16.8001 11.6667V16.6667C16.8001 16.7384 16.7385 16.8 16.6667 16.8H2.50008C2.42835 16.8 2.36675 16.7384 2.36675 16.6667V11.6667C2.36675 11.5949 2.42835 11.5333 2.50008 11.5333Z" stroke-width="1.4"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_923_419">
                            <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
                <div class="ml-3">
                    {{ __('Empresa') }}
                </div>
            </x-nav-link>
            <x-nav-link href="#" class="border-b-0  letra_custom">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-current hover:stroke-gray-900">
                    <g clip-path="url(#clip0_971_412)">
                        <path d="M2.37508 5.00056V4.99998C2.37508 4.46534 2.80791 4.03331 3.33341 4.03331H16.6667C17.1968 4.03331 17.6334 4.46991 17.6334 4.99998V15C17.6334 15.53 17.1968 15.9666 16.6667 15.9666H3.33341C2.80343 15.9666 2.36689 15.5302 2.36675 15.0002C2.36675 15.0001 2.36675 15.0001 2.36675 15L2.37508 5.00056Z" stroke-width="1.4"/>
                        <path d="M2.5 5L10 10L17.5 5" stroke-width="1.4"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_971_412">
                            <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>

                <div class="ml-3">
                    {{ __('Mensajes') }}
                </div>
            </x-nav-link>
            <x-nav-link href="#" class="border-b-0  letra_custom">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-current hover:stroke-gray-900">
                    <g clip-path="url(#clip0_971_406)">
                        <path d="M6.81106 6.11112C6.81106 4.34911 8.23793 2.92223 9.99994 2.92223C11.762 2.92223 13.1888 4.34911 13.1888 6.11112C13.1888 7.87313 11.762 9.30001 9.99994 9.30001C8.23793 9.30001 6.81106 7.87313 6.81106 6.11112ZM2.92217 14.8611C2.92217 14.4717 3.11169 14.0788 3.54717 13.6769C3.9874 13.2706 4.63067 12.904 5.39793 12.5967C6.93358 11.9815 8.78953 11.6722 9.99994 11.6722C11.2104 11.6722 13.0663 11.9815 14.602 12.5967C15.3692 12.904 16.0125 13.2706 16.4527 13.6769C16.8882 14.0788 17.0777 14.4717 17.0777 14.8611V17.0778H2.92217V14.8611Z" stroke-width="1.4"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_971_406">
                            <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>

                <div class="ml-3">
                    {{ __('Contactos') }}
                </div>
            </x-nav-link>
            <x-nav-link href="#" class="border-b-0  letra_custom">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-current hover:stroke-gray-900">
                    <g clip-path="url(#clip0_971_400)">
                        <path d="M5.00008 14.3H4.71013L4.50511 14.505L2.36675 16.6434V3.33335C2.36675 2.80329 2.80335 2.36669 3.33342 2.36669H16.6668C17.1968 2.36669 17.6334 2.80329 17.6334 3.33335V13.3334C17.6334 13.8634 17.1968 14.3 16.6668 14.3H5.00008Z" stroke-width="1.4"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_971_400">
                            <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
                <div class="ml-3">
                    {{ __('Chat') }}
                </div>
            </x-nav-link>
            <x-nav-link href="#" class="border-b-0  letra_custom">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-current hover:stroke-gray-900">
                    <g clip-path="url(#clip0_971_392)">
                        <path d="M2.50008 4.03334H17.5001C17.5718 4.03334 17.6334 4.09494 17.6334 4.16668V15.8333C17.6334 15.9051 17.5718 15.9667 17.5001 15.9667H2.50008C2.42835 15.9667 2.36675 15.9051 2.36675 15.8333V4.16668C2.36675 4.09494 2.42835 4.03334 2.50008 4.03334Z" stroke-width="1.4"/>
                        <rect x="6.5" y="3.33334" width="1.16667" height="13.3333" fill="#C2CFE0"/>
                        <rect x="12.3333" y="3.33334" width="1.16667" height="13.3333" fill="#C2CFE0"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_971_392">
                            <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
                <div class="ml-3">
                    {{ __('Ayuda') }}
                </div>
            </x-nav-link>
            <hr />
            <!-- Título del menú (clickeable) -->
            <div class="cursor-pointer flex justify-between items-center" id="menuTitle">
                <x-nav-link href="#" class="border-b-0  letra_custom">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-current fill-gray-800 hover:fill-gray-900">
                        <g clip-path="url(#clip0_971_386)">
                            <path d="M4.99992 8.33334C4.08325 8.33334 3.33325 9.08334 3.33325 10C3.33325 10.9167 4.08325 11.6667 4.99992 11.6667C5.91659 11.6667 6.66659 10.9167 6.66659 10C6.66659 9.08334 5.91659 8.33334 4.99992 8.33334ZM14.9999 8.33334C14.0833 8.33334 13.3333 9.08334 13.3333 10C13.3333 10.9167 14.0833 11.6667 14.9999 11.6667C15.9166 11.6667 16.6666 10.9167 16.6666 10C16.6666 9.08334 15.9166 8.33334 14.9999 8.33334ZM9.99992 8.33334C9.08325 8.33334 8.33325 9.08334 8.33325 10C8.33325 10.9167 9.08325 11.6667 9.99992 11.6667C10.9166 11.6667 11.6666 10.9167 11.6666 10C11.6666 9.08334 10.9166 8.33334 9.99992 8.33334Z" fill="currentColor"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_971_386">
                                <rect width="20" height="20" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <div class="ml-3">
                        {{ __('Configuración') }}
                    </div>
                </x-nav-link>
            </div>
            <!-- Menú Acordeón -->
            <div class="max-w-7xl mx-auto px-1 sm:px-1 lg:px-4">
                <!-- Contenido del menú (oculto por defecto) -->
                <div class="hidden" id="menuContent">
                    <!-- Lista de opciones del menú -->
                    <ul class="mt-2">
                            
                        <li>
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </x-dropdown-link>
                        </li>
                        <li><!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}"
                                            @click.prevent="$root.submit();">
                                    {{ __('Salir') }}
                                </x-dropdown-link>
                            </form>
                        </li>
                        <!-- Agrega más opciones según sea necesario -->
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Hamburger para dispositivos pequeños -->
        <div class="-me-2 flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <div class=" flex items-center" style="justify-content: center;">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="">
                        <img class="rounded-full ajuste_imagen object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif
            </div>
            <!-- Responsive Navigation Links -->
            <!-- Primer Menú -->
            @php
                $isEventosActive = request()->routeIs('eventos') || request()->routeIs('eventosActivos') || request()->routeIs('eventosDisponibles') || request()->routeIs('eventosFinalizados');
            @endphp

            <div class="cursor-pointer ml-3 flex justify-between items-center" id="MinieventosLink">
                <x-nav-link href="#" :active="$isEventosActive" class="border-b-0 letra_custom">
                    <svg width="30" height="30" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-current hover:stroke-gray-900">
                        <g clip-path="url(#clip0_923_425)">
                            <path d="M3.5 10.1333C3.33431 10.1333 3.2 9.99902 3.2 9.83333V3.5C3.2 3.33431 3.33431 3.2 3.5 3.2H8.16667C8.33235 3.2 8.46667 3.33431 8.46667 3.5V9.83333C8.46667 9.99902 8.33235 10.1333 8.16667 10.1333H3.5ZM3.5 16.8C3.33431 16.8 3.2 16.6657 3.2 16.5V13.5C3.2 13.3343 3.33431 13.2 3.5 13.2H8.16667C8.33235 13.2 8.46667 13.3343 8.46667 13.5V16.5C8.46667 16.6657 8.33235 16.8 8.16667 16.8H3.5ZM11.8333 16.8C11.6676 16.8 11.5333 16.6657 11.5333 16.5V10.1667C11.5333 10.001 11.6676 9.86667 11.8333 9.86667H16.5C16.6657 9.86667 16.8 10.001 16.8 10.1667V16.5C16.8 16.6657 16.6657 16.8 16.5 16.8H11.8333ZM11.5333 3.5C11.5333 3.33431 11.6676 3.2 11.8333 3.2H16.5C16.6657 3.2 16.8 3.33431 16.8 3.5V6.5C16.8 6.66569 16.6657 6.8 16.5 6.8H11.8333C11.6676 6.8 11.5333 6.66569 11.5333 6.5V3.5Z" stroke-width="1.4"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_923_425">
                                <rect width="20" height="20" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </x-nav-link>
            </div>

            <!-- Menú Acordeón -->
            <div class="{{ $isEventosActive ? 'block' : 'hidden' }} max-w-7xl mx-auto px-1 sm:px-1 lg:px-4 flex justify-center items-center" id="MinieventoContent">
                <!-- Lista de opciones del menú -->
                <ul class="flex flex-col items-center w-full">
                    <li class="mb-2 {{request()->routeIs('eventosActivos') ? 'bg-gray-200' : '' }}">
                        <x-nav-link href="{{ route('eventosActivos') }}" :active="request()->routeIs('eventosActivos')" class="border-b-0 letra_custom "><!--{{ request()->routeIs('eventosActivos') ? 'bg-gray-200' : '' }}-->
                            <svg width="12" height="12" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4" r="3" stroke="#FFB946" stroke-width="2"/>
                            </svg>
                        </x-nav-link>
                    </li>
                    <li class="mb-2 {{request()->routeIs('eventosDisponibles') ? 'bg-gray-200' : '' }}">
                        <x-nav-link href="{{ route('eventosDisponibles') }}" :active="request()->routeIs('eventosDisponibles')" class="border-b-0 letra_custom">
                            <svg width="12" height="12" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4" r="3" stroke="#2ED47A" stroke-width="2"/>
                            </svg>
                        </x-nav-link>
                    </li>
                    <li class="mb-2 {{request()->routeIs('eventosFinalizados') ? 'bg-gray-200' : '' }}">
                        <x-nav-link href="{{ route('eventosFinalizados') }}" :active="request()->routeIs('eventosFinalizados')" class="border-b-0 letra_custom">
                            <svg width="12" height="12" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4" r="3" stroke="#F7685B" stroke-width="2"/>
                            </svg>
                        </x-nav-link>
                    </li>
                </ul>
            </div>
            <x-nav-link href="{{ route('empresas') }}" :active="request()->routeIs('empresas')" class="ml-3 border-b-0  letra_custom">
                <svg width="30" height="30" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-current hover:stroke-gray-900">
                    <g clip-path="url(#clip0_923_419)">
                        <path d="M2.50008 3.2H16.6667C16.7385 3.2 16.8001 3.2616 16.8001 3.33333V8.33333C16.8001 8.40507 16.7385 8.46667 16.6667 8.46667H2.50008C2.42835 8.46667 2.36675 8.40507 2.36675 8.33333V3.33333C2.36675 3.2616 2.42835 3.2 2.50008 3.2ZM2.50008 11.5333H16.6667C16.7385 11.5333 16.8001 11.5949 16.8001 11.6667V16.6667C16.8001 16.7384 16.7385 16.8 16.6667 16.8H2.50008C2.42835 16.8 2.36675 16.7384 2.36675 16.6667V11.6667C2.36675 11.5949 2.42835 11.5333 2.50008 11.5333Z" stroke-width="1.4"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_923_419">
                            <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </x-nav-link>
            <x-nav-link href="#" class="ml-3 border-b-0  letra_custom">
                <svg width="30" height="30" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-current hover:stroke-gray-900">
                    <g clip-path="url(#clip0_971_412)">
                        <path d="M2.37508 5.00056V4.99998C2.37508 4.46534 2.80791 4.03331 3.33341 4.03331H16.6667C17.1968 4.03331 17.6334 4.46991 17.6334 4.99998V15C17.6334 15.53 17.1968 15.9666 16.6667 15.9666H3.33341C2.80343 15.9666 2.36689 15.5302 2.36675 15.0002C2.36675 15.0001 2.36675 15.0001 2.36675 15L2.37508 5.00056Z" stroke-width="1.4"/>
                        <path d="M2.5 5L10 10L17.5 5" stroke-width="1.4"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_971_412">
                            <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </x-nav-link>
            <x-nav-link href="#" class="ml-3 border-b-0  letra_custom">
                <svg width="30" height="30" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-current hover:stroke-gray-900">
                    <g clip-path="url(#clip0_971_406)">
                        <path d="M6.81106 6.11112C6.81106 4.34911 8.23793 2.92223 9.99994 2.92223C11.762 2.92223 13.1888 4.34911 13.1888 6.11112C13.1888 7.87313 11.762 9.30001 9.99994 9.30001C8.23793 9.30001 6.81106 7.87313 6.81106 6.11112ZM2.92217 14.8611C2.92217 14.4717 3.11169 14.0788 3.54717 13.6769C3.9874 13.2706 4.63067 12.904 5.39793 12.5967C6.93358 11.9815 8.78953 11.6722 9.99994 11.6722C11.2104 11.6722 13.0663 11.9815 14.602 12.5967C15.3692 12.904 16.0125 13.2706 16.4527 13.6769C16.8882 14.0788 17.0777 14.4717 17.0777 14.8611V17.0778H2.92217V14.8611Z" stroke-width="1.4"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_971_406">
                            <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </x-nav-link>
            <x-nav-link href="#" class="ml-3 border-b-0  letra_custom">
                <svg width="30" height="30" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-current hover:stroke-gray-900">
                    <g clip-path="url(#clip0_971_400)">
                        <path d="M5.00008 14.3H4.71013L4.50511 14.505L2.36675 16.6434V3.33335C2.36675 2.80329 2.80335 2.36669 3.33342 2.36669H16.6668C17.1968 2.36669 17.6334 2.80329 17.6334 3.33335V13.3334C17.6334 13.8634 17.1968 14.3 16.6668 14.3H5.00008Z" stroke-width="1.4"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_971_400">
                            <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </x-nav-link>
            <x-nav-link href="#" class="ml-3 border-b-0  letra_custom">
                <svg width="30" height="30" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="stroke-current hover:stroke-gray-900">
                    <g clip-path="url(#clip0_971_392)">
                        <path d="M2.50008 4.03334H17.5001C17.5718 4.03334 17.6334 4.09494 17.6334 4.16668V15.8333C17.6334 15.9051 17.5718 15.9667 17.5001 15.9667H2.50008C2.42835 15.9667 2.36675 15.9051 2.36675 15.8333V4.16668C2.36675 4.09494 2.42835 4.03334 2.50008 4.03334Z" stroke-width="1.4"/>
                        <rect x="6.5" y="3.33334" width="1.16667" height="13.3333" fill="#C2CFE0"/>
                        <rect x="12.3333" y="3.33334" width="1.16667" height="13.3333" fill="#C2CFE0"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_971_392">
                            <rect width="20" height="20" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </x-nav-link>
            <hr />
            <!-- Título del menú (clickeable) -->
            <div class="ml-3 cursor-pointer flex justify-between items-center" id="MinimenuTitle">
                <x-nav-link href="#" class="border-b-0">
                    <svg width="30" height="30" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="fill-current fill-gray-800 hover:fill-gray-900">
                        <g clip-path="url(#clip0_971_386)">
                            <path d="M4.99992 8.33334C4.08325 8.33334 3.33325 9.08334 3.33325 10C3.33325 10.9167 4.08325 11.6667 4.99992 11.6667C5.91659 11.6667 6.66659 10.9167 6.66659 10C6.66659 9.08334 5.91659 8.33334 4.99992 8.33334ZM14.9999 8.33334C14.0833 8.33334 13.3333 9.08334 13.3333 10C13.3333 10.9167 14.0833 11.6667 14.9999 11.6667C15.9166 11.6667 16.6666 10.9167 16.6666 10C16.6666 9.08334 15.9166 8.33334 14.9999 8.33334ZM9.99992 8.33334C9.08325 8.33334 8.33325 9.08334 8.33325 10C8.33325 10.9167 9.08325 11.6667 9.99992 11.6667C10.9166 11.6667 11.6666 10.9167 11.6666 10C11.6666 9.08334 10.9166 8.33334 9.99992 8.33334Z" fill="currentColor"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_971_386">
                                <rect width="20" height="20" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </x-nav-link>
            </div>
            <!-- Menú Acordeón -->
            <div class="max-w-7xl mx-auto px-1 sm:px-1 lg:px-4">
                <!-- Contenido del menú (oculto por defecto) -->
                <div class="hidden" id="MinimenuContent">
                    <!-- Lista de opciones del menú -->
                    <ul>
                            
                        <li>
                            <x-dropdown-link href="{{ route('profile.show') }}">
                            <svg width="20" height="20" viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg" class="text-gray-500" style="filter: hue-rotate(180deg) saturate(200%);">
                                    <defs id="defs1" />
                                    <g id="g1">
                                        <image  width="512" height="512"
                                            preserveAspectRatio="none"
                                            style="image-rendering:optimizeQuality"
                                            xlink:href="data:image/png;base64,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&#10;"
                                            id="image1"
                                            x="-1.0058982"
                                            y="1.0720873e-05" />
                                    </g>
                                </svg>
                            </x-dropdown-link>
                        </li>
                        <li><!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    <svg width="20" height="20" viewBox="0 0 116.68369 120.70728" xml:space="preserve"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:svg="http://www.w3.org/2000/svg">
                                        <defs id="defs1" />
                                        <g id="g1" transform="translate(-261.02945,-279.13559)"><image
                                            width="116.6837"
                                            height="120.70728"
                                            preserveAspectRatio="none"
                                            style="image-rendering:optimizeQuality"
                                            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAYAAAD0eNT6AAAABHNCSVQICAgIfAhkiAAAIABJREFU&#10;eJzt3Xm03lV97/F3TkIGSCAYhjBZgUIIAiJoAbGCgIKiiBTqjFIriKu9SG+xthe8q7aly4tVW0VQ&#10;L1pGy604M5ZJFGSsCNQSwjwFIgHJRCDDuX/sHDJwcnKe57d/v+9veL/W+iyUtqv7+Z5nD89v2Bsk&#10;SZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIk&#10;SZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIk&#10;SZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIkSZIk&#10;SZIkSZIkSZIkSZIkSZIkSZIkSZIkqU9johsgSSXYAJgITFr5z5EyAXgBWLAy81f7zwuApRW3XaqE&#10;CwBJTbEhMH21bLnWf1/930/I+P/3RYZfGKxrwTAHmAU8iIsH1ZgLAEl1MgWYsVp2WfnP7Vf+z5pk&#10;GWkRMGuYzA1slwS4AJAUYztgV9ac5HcBto5sVIV+B9zHKxcGs4Elge1Sh7gAkFS2DYE3APsB+67M&#10;9NAW1dcK4FFWLQhuBa4l3VaQsnIBICm3nUiT/NCEvzswLrRFzXcvaSFwLXA9MC+0NWoFFwCSipoJ&#10;vAM4iDThT4ttTusNAnexakFwA+lBRKknLgAk9Woj0mT/jpV5TWhrtBy4g1ULghuBxaEtUiO4AJA0&#10;GkO/8t8BvAUYH9scjeAl4BZWLQhuXvnvJElar7HA24GvAw+RLjubZmYx8GPgaPLujyBJaokxwJuA&#10;rwJPEz9xmfx5FjiL9ICmOs5bAJL2AD4IvB/4veC2qDqzgfOA84FHgtsiSarIjsCpwH8R/6vUxGYF&#10;cB1wHM3bbVGSNAobAseTHhCLnnRMPbMIuID0/McAkqRG2xH4J+A54icY05w8AXwBeC2SpMYYAxwG&#10;/JT0nnj0ZGKanTuAPyftASFJqqFNgJNIB81ETxqmfXmG9OzIVCRJtbAr6Z39BcRPEqb9eR44Hdgc&#10;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&#10;B1Zmu+C2qDqzSQfznA88EtwWSVKgMaTDWs4iPe0d/cvU5M+zK/+++yFJ0jDGAe8EziE9DBY9cZn+&#10;sxj4MXA0MAFpJW8BSBqNPUivFb6DdDDRBrHN0QheAm4Brl2Zm1f+O2kNLgAk9WoKcBBpMXAY8Hux&#10;zem85aT39Icm/BtJv/qlEbkAkFTUTNJC4BDSaYXTYpvTeoPAXaya8G8A5oe2SI3kAkBSbjsB+5IW&#10;A/uSbh94y6CYe1k14V9P2tRJKsQFgKSyTQL2Ii0GhrJtaIvqawXwKDBrZW4lTfpzIhuldnIBICnC&#10;VqQtZndZmZkr/7l1ZKMq9DvgPlZN9EOZDSwJbJc6xAWApDrZGJjBqgXBUHagea+wLQMe5JWT/Cxg&#10;bmC7JMAFgKTmmApsuVqmj/Dfcy4WXgQWkB60WzBM1v73c0iT/IPA0oztkLJyASCpjTYAJq6WSWv9&#10;99UzAXiBdU/oTuKSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmS&#10;JEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmS&#10;JEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmS&#10;JEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJEmSJK3u/wMSZo3sdSZMhgAAAABJRU5ErkJg&#10;gg==&#10;"
                                            id="image1-8"
                                            x="261.02945"
                                            y="279.13559" />
                                        </g>
                                    </svg>
                                </x-dropdown-link>
                            </form>
                        </li>
                        <!-- Agrega más opciones según sea necesario -->
                    </ul>
                </div>
            </div>
            <!-- Otros menús aquí -->
        </div>
    </div>
</nav>
<script>
    //Envetos
    const menuTitle = document.getElementById('menuTitle');
    const menuContent = document.getElementById('menuContent');
    const icon = menuTitle.querySelector('svg');
    menuTitle.addEventListener('click', () => {
        // Cambia la visibilidad del contenido del menú
        menuContent.classList.toggle('hidden');
        // Rota el icono para indicar la dirección del despliegue
        icon.classList.toggle('rotate-90');
    });
    //configuracion
    const menuEventos = document.getElementById('eventosLink');
    const eventoContent = document.getElementById('eventoContent');
    const iconE = menuEventos.querySelector('svg');
    menuEventos.addEventListener('click', () => {
        // Cambia la visibilidad del contenido del menú
        eventoContent.classList.toggle('hidden');
        // Rota el icono para indicar la dirección del despliegue
        iconE.classList.toggle('rotate-90');
    });
    //miniEventos
    const MinimenuTitle = document.getElementById('MinimenuTitle');
    const MinimenuContent = document.getElementById('MinimenuContent');
    const Miniicon = MinimenuTitle.querySelector('svg');
    MinimenuTitle.addEventListener('click', () => {
        // Cambia la visibilidad del contenido del menú
        MinimenuContent.classList.toggle('hidden');
        // Rota el icono para indicar la dirección del despliegue
        Miniicon.classList.toggle('rotate-90');
    });
    //configuracionMini
    const MinimenuEventos = document.getElementById('MinieventosLink');
    const MinieventoContent = document.getElementById('MinieventoContent');
    const MiniiconE = menuEventos.querySelector('svg');
    MinimenuEventos.addEventListener('click', () => {
        // Cambia la visibilidad del contenido del menú
        MinieventoContent.classList.toggle('hidden');
        // Rota el icono para indicar la dirección del despliegue
        MiniiconE.classList.toggle('rotate-90');
    });

    
    
    
</script>