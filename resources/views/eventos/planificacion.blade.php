<x-app-layout>
    <div class="py-3">
        <!--Contenedor de la página-->
        @foreach([$event] as $env)
            <div class=" ml-4 pr-3">
                <div class="flex justify-between items-center">
                    <a href="{{ route('evento.participantes', ['id' => $env->id]) }}" class="btnreturn flex items-center space-x-2">
                        <x-icon_back/>
                        <h1 class="text-lg font-semibold">Planificación</h1>
                    </a>
                    <a href="{{ route('turnos.index', ['id' => $event->id]) }}">
                        <button class="inline-flex items-center px-6 py-2 mr-4 bg-verde-800 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-verde-700 focus:bg-verde-700 active:bg-verde-900 focus:outline-none focus:ring-2 focus:ring-verde-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150'">Turnos</button>
                    </a>
                </div>

            </div>
            <div class="container mx-auto p-4">
                <div class="bg-white shadow-lg p-0 flex">
                    <div class="w-xs">
                        <img src="{{ asset($env->banner) }}" alt="{{$env->name}}" class="w-full object-cover">
                    </div>
                    <div class="w-1/2 p-4 relative">
                        <div class=" top-4 right-4">
                            <span class="bg-yellow-500 text-white rounded px-6 py-1" style="font-size:11px;">Activo</span>
                        </div>
                        <br>
                        <div class="top-4 right-4">
                            <h3 class="text-2xl font-bold">{{$event->name}}</h3>
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="logo-empre-container flex justify-center items-center">
                                <img src="{{asset($env->perfil)}}" alt="Logo" class="rounded-full">
                            </div>
                            <div class="w-7/10 ml-1">
                                <p class="text-lg flex items-center"><span class="material-icons">
                                    @if (\Carbon\Carbon::parse($event->start_date)->isSameDay(\Carbon\Carbon::parse($event->end_date)))
                                        {{ \Carbon\Carbon::parse($event->start_date)->locale('es')->isoFormat('DD [de] MMMM [de] YYYY') }}
                                    @else
                                        {{ \Carbon\Carbon::parse($event->start_date)->locale('es')->isoFormat('DD') }} al {{ \Carbon\Carbon::parse($event->end_date)->locale('es')->isoFormat('DD [de] MMMM [de] YYYY') }}
                                    @endif
                                </p>
                                <p class="text-lg flex items-center"><span class="material-icons font-bold">{{$event->locality}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @livewire('participantes-table', ['id' => $event->id])
            </div>
        @endforeach
    </div>
</x-app-layout>
