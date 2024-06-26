<div>
    <div id="main-content" class="pb-4 grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($eventos as $event)
            @if($event->active)
                <div class="card_eventos bg-white rounded-lg">
            @else
                <div class="card_eventos bg-gray rounded-lg opacity-50">
            @endif
                <div class="card_eventos_wrapper">
                    <div class="card_eventos_container flex">
                        <div class="card_eventos_left flex items-center">
                            <div class="ml-4">
                                <div class="card_eventos_details flex flex-col eventos-title items-center">
                                    <p id="name">{{ $event->name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="sm:max-lg:py-2  card_eventos_left flex justify-center">
                            @if($event->active == 1)
                                <span class="inline-flex items-center rounded-md bg-yellow-400 border border-yellow-400 px-4 py-1 font-medium text-white" style="font-size: 11px;">Activo</span>
                            @else
                                <div class="mt-1 flex items-center gap-x-1.5">
                                    <div class="flex-none rounded-full bg-red-500 p-1">
                                        <div class="h-1.5 w-1.5 rounded-full bg-white"></div>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-500">Finalizado</p>
                                </div>
                            @endif  
                        </div>
                    </div>
                </div>
                <div class="card_eventos_img" id="banner">
                    <div class="logo_principal">
                        <img src="{{$event->banner}}" alt="Logo">
                    </div>
                </div>
                <div  class="card_eventos_wrapper">
                    <div wire:key="{{ $event->id }}" class="card_eventos_container flex flex-col lg:flex-row">
                        <div class="py-4 lg:py-0 card_eventos_left flex items-center">
                            <img id="logo" src="{{$event->organizers->companies->logo}}" alt="Logo empresa" width="50" height="50" class="rounded-full">
                            <div class="ml-4">
                                <div class="card_eventos_details flex flex-col">
                                    <p class="fecha_event" id="date">
                                        @if (\Carbon\Carbon::parse($event->start_date)->isSameDay(\Carbon\Carbon::parse($event->end_date)))
                                            {{ \Carbon\Carbon::parse($event->start_date)->locale('es')->isoFormat('DD [de] MMMM [de] YYYY') }}
                                        @else
                                            {{ \Carbon\Carbon::parse($event->start_date)->locale('es')->isoFormat('DD') }} al {{ \Carbon\Carbon::parse($event->end_date)->locale('es')->isoFormat('DD [de] MMMM [de] YYYY') }}
                                        @endif
                                    </p>
                                    <p class="eventos-title" id="place">{{ $event->locality }}</p>
                                </div>
                            </div>
                        </div>
                        {{--<form action="{{ route('evento.participar', ['id' => $event->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md">Participar</button>
                        </form>--}}
                        <x-button wire:click="verDetalleEvento({{$event}})">Ver evento</x-button>
                        
                    </div>
                </div>                    
            </div>
        @endforeach
    </div>
    <!-- Modal de Evento -->
    <div x-data="{ openModal: false }" x-on:open-modal.window="openModal = true">
        <x-modal-evento name="ver-Evento">
            <x-slot:body>
                @if ($eventoSeleccionado)
                    <div class="text-gray-900 font-sans text-3xl font-black mb-4">{{$eventoSeleccionado->name}}</div>
                    <div class="font-sans mt-2 text-sm">
                        {{$eventoSeleccionado->description}}
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="col-span-2 sm:col-span-1">
                            <img src="{{$qrCode}}" alt="">
                        </div>
                        <div class="col-span-2 sm:col-span-2 flex flex-col justify-between">
                            <div class="font-sans mt-2 font-black">
                                {{$eventoSeleccionado->locality}}
                            </div>
                            <div class="flex font-sans mt-2 text-xs mt-4">
                                <h4 class="font-sans text-gray-400 mr-3">Ubicacion:  </h4>
                                  <p>{{$eventoSeleccionado->place}}</p>
                            </div>
                            <div class="flex items-center space-x-4 mt-auto text-xs">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <div class="rounded-full object-cover w-12 h-12">
                                        <img class="h-full w-full rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </div>
                                @else
                                    <div class="w-imagen">
                                        <img class="h-full w-full rounded-full object-cover" src=".\assets\imagenes\avatar_Zprevia.png" alt="{{ Auth::user()->name }}" />
                                    </div>
                                @endif
                                <p class="pl-1">
                                    {{$eventoSeleccionado->organizers->companies->email}}
                                </p>
                            </div>
                        </div>
                        <div class="col-span-2 sm:col-span-1 flex flex-col justify-between">
                            <div class="mt-2 text-xs">
                                <p class="text-gray-400" id="date">
                                    @if (\Carbon\Carbon::parse($eventoSeleccionado->start_date)->isSameDay(\Carbon\Carbon::parse($eventoSeleccionado->end_date)))
                                        {{ \Carbon\Carbon::parse($eventoSeleccionado->start_date)->locale('es')->isoFormat('DD [de] MMMM [de] YYYY') }}
                                    @else
                                        {{ \Carbon\Carbon::parse($eventoSeleccionado->start_date)->locale('es')->isoFormat('DD') }} al {{ \Carbon\Carbon::parse($eventoSeleccionado->end_date)->locale('es')->isoFormat('DD [de] MMMM YYYY') }}
                                    @endif
                                </p>
                            </div>
                            <div class="mt-auto">
                                <form action="{{ route('evento.participar', ['id' => $eventoSeleccionado->id]) }}" method="POST">
                                    @csrf    
                                    <button class=" w-full bg-green-500 hover:bg-green-600 focus:bg-green-400 text-white px-4 py-2 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition duration-300 ease-in-out">
                                        Participar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif    
            </x-slot>
        </x-modal-evento>
    </div>
</div>
