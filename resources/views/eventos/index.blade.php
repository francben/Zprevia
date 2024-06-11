<x-app-layout>
    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <!--Contenedor de la página-->
                <div id="main-content" class="grid grid-cols-2 gap-6">
                    @foreach($eventos as $event)
                        @if($event->active)
                            <div class="card_eventos bg-white sm:rounded-lg">
                                <div class="card_eventos_wrapper">
                                    <div class="card_eventos_container flex items-center justify-between">
                                        <div class="card_eventos_left flex items-center">
                        @else
                            <div class="card_eventos bg-gray sm:rounded-lg opacity-50">
                                <div class="card_eventos_wrapper">
                                    <div class="card_eventos_container flex items-center justify-between">
                                        <div class="card_eventos_left flex items-center">
                        @endif
                                        <div class="ml-4">
                                            <div class="card_eventos_details flex flex-col eventos-title items-center">
                                                <p id="name">{{ $event->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card_eventos_left">
                                        @if($event->active == 1)
                                            <span class="inline-flex items-center rounded-md bg-yellow-400 border border-yellow-400 px-2 py-1 text-xs font-medium text-white">Activo</span>
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
                            <div class="card_eventos_wrapper">
                                <div class="card_eventos_container flex items-center justify-between">
                                    <div class="card_eventos_left flex items-center">
                                        <img id="logo" src="img/zprevia_logo.png" alt="Logo empresa" width="50" height="50" class="rounded-full">
                                        <div class="ml-4">
                                            <div class="card_eventos_details flex flex-col">
                                                <p class="fecha_event" id="date">{{ \Carbon\Carbon::parse($event->date)->locale('es')->isoFormat('DD [de] MMMM [de] YYYY') }}</p>
                                                <p class="eventos-title" id="place">{{ $event->locality }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('evento.participar', ['id' => $event->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md">Participar</button>
                                    </form>
                                </div>
                            </div>                    
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Component Outside Foreach Loop -->
    <div x-data x-on:open-modal.window="open = true; title = $event.detail.title; eventId = $event.detail.eventId">
        <x-modal-inscripcion>
            <!-- Modal content goes here -->
        </x-modal-inscripcion>
    </div>
</x-app-layout>
