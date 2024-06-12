<x-app-layout>
    <div class="py-7">
        <!--Contenedor de la página-->
        @foreach([$event] as $env)
            <div class=" p-6">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-xl font-bold">PARTICIPANTES</h1>
                    @if($env->pagado)
                        <a href="{{ route('evento.planificar', ['id' => $event->id]) }}">
                            <button class="inline-flex items-center px-6 py-3 bg-verde-800 border border-transparent rounded-md font-semibold text-xl text-white tracking-widest hover:bg-verde-700 focus:bg-verde-700 active:bg-verde-900 focus:outline-none focus:ring-2 focus:ring-verde-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150'">Planificación</button>
                        </a>
                    @else
                        <button class="bg-gray-500 text-white px-6 py-3 text-xl">Planificación</button>
                    @endif
                </div>
            </div>
            <div class="container mx-auto p-4">
                <div class="bg-white shadow-lg p-0 flex">
                    <div class="w-1/2 ">
                        <img src="{{ $env->banner }}" alt="Conecta Empresarios 2024" class="w-full h-full object-cover">
                    </div>
                    <div class="w-1/2 p-4 relative">
                        <div class=" top-4 right-4">
                            <span class="bg-yellow-500 text-white rounded px-5 py-1">Activo</span>
                        </div>
                        <br>
                        <div class="top-4 right-4">
                            <h3 class="text-2xl font-bold">{{$event->name}}</h3>
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="flex justify-center items-center">
                                <img src="{{$env->perfil}}" alt="Logo" class="rounded-full">
                            </div>
                            <div class="w-7/10">
                                <p class="text-lg mt-2 flex items-center"><span class="material-icons">{{ \Carbon\Carbon::parse($event->date)->locale('es')->isoFormat('DD [de] MMMM [de] YYYY') }}</p>
                                <p class="text-lg mt-2 flex items-center"><span class="material-icons font-bold">{{$event->locality}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative bg-white mt-6 grid grid-cols-1 md:grid-cols-2 gap-6 content-container h-[calc(100vh-200px)] overflow-hidden">
                    
                        @if($env->pagado)
                            @foreach($participantes as $part)
                                <div class="bg-white p-6 gap-6 rounded-lg shadow-md" style="margin: 20px;">
                                    <div class="flex">
                                        <div class="image-container w-3/10">
                                            <img src="path-to-logo.png" alt="Logo" class="h-16 mr-4">
                                        </div>
                                        <div class="info-container w-7/10">
                                            <h4 class="text-xl font-bold">{{ $part->name }}</h4>
                                            <h5 class="text-xl font-bold"></h5>
                                            <p class="text-gray-600">{{ $part->description }}</p>
                                        </div>
                                    </div>
                                    <div class="footer mt-4 flex items-center justify-between">
                                        <div class="buttons flex gap-2">
                                            <button class="bg-gray-500 text-white px-4 py-2 rounded">Video</button>
                                            <button class="bg-gray-500 text-white px-4 py-2 rounded">Dossier</button>
                                        </div>
                                        <div class="heart-icon text-gray-200 cursor-pointer">
                                            <x-hearticon/>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @foreach($participantes as $part)
                                <div class="bg-white p-6 gap-6 rounded-lg shadow-md blur-sm" style="margin: 20px;">
                                    <div class="flex">
                                        <div class="image-container w-3/10">
                                            <img src="path-to-logo.png" alt="Logo" class="h-16 mr-4">
                                        </div>
                                        <div class="info-container w-7/10">
                                            <h4 class="text-xl font-bold">{{ $part->name }}</h4>
                                            <h5 class="text-xl font-bold"></h5>
                                            <p class="text-gray-600">{{ $part->description }}</p>
                                        </div>
                                    </div>
                                    <div class="footer mt-4 flex items-center justify-between">
                                        <div class="buttons flex gap-2">
                                            <button class="bg-gray-500 text-white px-4 py-2 rounded">Video</button>
                                            <button class="bg-gray-500 text-white px-4 py-2 rounded">Dossier</button>
                                        </div>
                                        <div class="heart-icon text-gray-200 cursor-pointer">
                                            <x-hearticon/>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if(!$env->pagado)
                            <div class="absolute inset-0 flex items-center justify-center z-20">
                                <a href="{{ route('evento.completarpago', ['id' => $event->id]) }}" class="inline-flex justify-center items-center px-4 py-2 bg-verde-800 border border-transparent rounded-md font-semibold text-base text-white tracking-widest hover:bg-verde-700 focus:bg-verde-700 active:bg-verde-900 focus:outline-none focus:ring-2 focus:ring-verde-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
                                    Completar pago
                                </a>
                            </div>
                        @endif
                </div>
            @endforeach
        </div>
</x-app-layout>
