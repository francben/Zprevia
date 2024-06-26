<nav x-data="{ open: false }" class="bg-white ml-1 pt-2 w-full">
    <!-- Logo -->
    <div class="ml-4 max-w-7xl mx-auto px-2 flex justify-between items-center h-16">
        <div class="flex items-center">
            <a href="{{ route('eventos.index') }}">
                <x-application-mark class="block h-9 w-auto" />
            </a>
        </div>
    </div>
    <hr />
    <!-- Datos de Usuario -->
    <div class="max-w-7xl mx-auto justify-between items-center h-16 mt-4 mx-4 flex flex-col items-start space-y-4 mt-4">
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
    <div class="block max-w-7xl mx-auto px-2 justify-between h-16">
        <div class="flex flex-col items-start ml-3 space-y-4"id="eventosLink">
            <!-- Primer Menú -->
            @php
                $isEventosActive = request()->routeIs('eventos.index') || request()->routeIs('eventosActivos') || request()->routeIs('eventosDisponibles') || request()->routeIs('eventosFinalizados');
            @endphp

            <div class="cursor-pointer flex justify-between items-center" >
                <x-nav-link href="{{ route('eventos.index') }}" :active="$isEventosActive" class="border-b-0 letra_custom">
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
                    <div class="ml-1">
                        {{ __('Eventos') }}
                    </div>
                </x-nav-link>
            </div>

            <!-- Menú Acordeón -->
            <div class="{{ $isEventosActive ? 'block' : 'hidden' }} max-w-7xl mx-6 sm:px-1 lg:px-2" id="eventoContent">
                <!-- Lista de opciones del menú -->
                <ul class="mt-2">
                    <li class="mb-2">
                        <x-nav-link href="{{ route('eventosActivos') }}" :active="request()->routeIs('eventosActivos')" class="border-b-0 letra_custom "><!--{{ request()->routeIs('eventosActivos') ? 'bg-gray-200' : '' }}-->
                            <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4" r="3" stroke="#FFB946" stroke-width="2"/>
                            </svg>
                            <div class="ml-1">
                                {{ __('Activos') }}
                            </div>
                        </x-nav-link>
                    </li>
                    <li class="mb-2">
                        <x-nav-link href="{{ route('eventosDisponibles') }}" :active="request()->routeIs('eventosDisponibles')" class="border-b-0 letra_custom">
                            <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4" r="3" stroke="#2ED47A" stroke-width="2"/>
                            </svg>
                            <div class="ml-1">
                                {{ __('Disponibles') }}
                            </div>
                        </x-nav-link>
                    </li>
                    <li class="mb-2">
                        <x-nav-link href="{{ route('eventosFinalizados') }}" :active="request()->routeIs('eventosFinalizados')" class="border-b-0 letra_custom">
                            <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4" r="3" stroke="#F7685B" stroke-width="2"/>
                            </svg>
                            <div class="ml-1">
                                {{ __('Finalizados') }}
                            </div>
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex flex-col items-start ml-3 space-y-4 mt-4">
            <!-- Segundo Menú -->
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
        </div>
        {{--<div class="flex flex-col items-start ml-3 space-y-4 mt-4">
            <!-- Tercer Menú -->
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
        </div>--}}
        <div class="flex flex-col items-start ml-3 space-y-4 mt-4">
            <!-- Cuarto Menú -->
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
        </div>
        {{--<div class="flex flex-col items-start ml-3 space-y-4 mt-4">
            <!-- Quinto Menú -->
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
        </div>--}}
        <div class="flex flex-col items-start ml-3 space-y-4 mt-4" id="AyudaLink">
            <!-- Sexto Menú -->
            @php
                $isAyudaActive = request()->routeIs('guia') || request()->routeIs('politica') || request()->routeIs('aviso');
            @endphp
            <div class="cursor-pointer flex justify-between items-center" >
                <x-nav-link href="{{ route('guia') }}" :active="$isAyudaActive" class="border-b-0  letra_custom">
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
            </div>
            <!-- Menú Acordeón -->
            <div class="{{ $isAyudaActive ? 'block' : 'hidden' }} max-w-7xl mx-6 px-2" id="ayudaContent">
                <!-- Lista de opciones del menú -->
                <ul class="mt-2">
                    <li class="mb-2">
                        <x-nav-link href="{{ route('guia') }}" :active="request()->routeIs('guia')" class="border-b-0 letra_custom "><!--{{ request()->routeIs('eventosActivos') ? 'bg-gray-200' : '' }}-->
                            <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4" r="3" stroke="#01A69C" stroke-width="2"/>
                            </svg>
                            <div class="ml-1">
                                {{ __('Guia del Usuario') }}
                            </div>
                        </x-nav-link>
                    </li>
                    <li class="mb-2">
                        <x-nav-link href="{{ route('politica') }}" :active="request()->routeIs('politica')" class="border-b-0 letra_custom">
                            <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4" r="3" stroke="#01A69C" stroke-width="2"/>
                            </svg>
                            <div class="ml-1">
                                {{ __('Politica de Privacidad') }}
                            </div>
                        </x-nav-link>
                    </li>
                    <li class="mb-2">
                        <x-nav-link href="{{ route('aviso') }}" :active="request()->routeIs('aviso')" class="border-b-0 letra_custom">
                            <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4" cy="4" r="3" stroke="#01A69C" stroke-width="2"/>
                            </svg>
                            <div class="ml-1">
                                {{ __('Aviso Legal') }}
                            </div>
                        </x-nav-link>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex flex-col items-start ml-3 space-y-4 mt-4">
            <!-- Septimo Menú -->
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
                            <x-dropdown-link href="{{ route('company.perfil') }}">
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
        <div class="hidden -me-2 flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</nav>
<script>
    //configuracion
    const menuTitle = document.getElementById('menuTitle');
    const menuContent = document.getElementById('menuContent');
    const icon = menuTitle.querySelector('svg');
    menuTitle.addEventListener('click', () => {
        // Cambia la visibilidad del contenido del menú
        menuContent.classList.toggle('hidden');
        // Rota el icono para indicar la dirección del despliegue
        icon.classList.toggle('rotate-90');
    });
    //Envetos
    const menuEventos = document.getElementById('eventosLink');
    const eventoContent = document.getElementById('eventoContent');
    const iconE = menuEventos.querySelector('svg');
    function showMenu() {
        eventoContent.classList.remove('hidden');
        iconE.classList.add('rotate-90');
    }

    // Función para ocultar el contenido del menú
    function hideMenu() {
        eventoContent.classList.add('hidden');
        iconE.classList.remove('rotate-90');
    }

    // Mostrar el menú cuando el ratón esté sobre el enlace o el contenido
    menuEventos.addEventListener('mouseover', showMenu);
    eventoContent.addEventListener('mouseover', showMenu);

    // Ocultar el menú cuando el ratón salga del enlace o el contenido
    menuEventos.addEventListener('mouseout', (event) => {
        // Solo ocultar si el ratón no está entrando al contenido del menú
        if (!eventoContent.contains(event.relatedTarget)) {
            hideMenu();
        }
    });

    eventoContent.addEventListener('mouseout', (event) => {
        // Solo ocultar si el ratón no está entrando al enlace del menú
        if (!menuEventos.contains(event.relatedTarget)) {
            hideMenu();
        }
    });
    //Ayuda
    const ayudaEventos = document.getElementById('AyudaLink');
    const ayudaContent = document.getElementById('ayudaContent');
    const iconA = ayudaEventos.querySelector('svg');
    function showAyuda() {
        ayudaContent.classList.remove('hidden');
        iconA.classList.add('rotate-90');
    }

    // Función para ocultar el contenido del menú
    function hideAyuda() {
        ayudaContent.classList.add('hidden');
        iconA.classList.remove('rotate-90');
    }

    // Mostrar el menú cuando el ratón esté sobre el enlace o el contenido
    ayudaEventos.addEventListener('mouseover', showAyuda);
    ayudaContent.addEventListener('mouseover', showAyuda);

    // Ocultar el menú cuando el ratón salga del enlace o el contenido
    ayudaEventos.addEventListener('mouseout', (event) => {
        // Solo ocultar si el ratón no está entrando al contenido del menú
        if (!ayudaContent.contains(event.relatedTarget)) {
            hideAyuda();
        }
    });

    ayudaContent.addEventListener('mouseout', (event) => {
        // Solo ocultar si el ratón no está entrando al enlace del menú
        if (!menuEventos.contains(event.relatedTarget)) {
            hideMenu();
        }
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
    function minishowMenu() {
        MinieventoContent.classList.remove('hidden');
        MiniiconE.classList.add('rotate-90');
    }

    // Función para ocultar el contenido del menú
    function minihideMenu() {
        MinieventoContent.classList.add('hidden');
        MiniiconE.classList.remove('rotate-90');
    }

    // Mostrar el menú cuando el ratón esté sobre el enlace o el contenido
    MinimenuEventos.addEventListener('mouseover', minishowMenu);
    MinieventoContent.addEventListener('mouseover', minishowMenu);

    // Ocultar el menú cuando el ratón salga del enlace o el contenido
    MinimenuEventos.addEventListener('mouseout', (event) => {
        // Solo ocultar si el ratón no está entrando al contenido del menú
        if (!MinieventoContent.contains(event.relatedTarget)) {
            minihideMenu();
        }
    });

    MinieventoContent.addEventListener('mouseout', (event) => {
        // Solo ocultar si el ratón no está entrando al enlace del menú
        if (!MinimenuEventos.contains(event.relatedTarget)) {
            minihideMenu();
        }
    });

    
    
    
</script>