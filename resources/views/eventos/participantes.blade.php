<x-app-layout>
    <div class="py-7">
        <!--Contenedor de la página-->
        <div class=" p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-bold">PARTICIPANTES</h1>
                
                <button class="bg-gray-500 text-white px-6 py-3 text-xl">Planificación</button>
            </div>
        </div>
        <div class="container mx-auto p-4">
            @foreach([$event] as $env)
                <div class="bg-white shadow-lg p-0 flex">
                    <div class="w-1/2 ">
                        <img src="path-to-banner-image.png" alt="Conecta Empresarios 2024" class="w-full h-full object-cover">
                    </div>
                    <div class="w-1/2 p-4 relative">
                        <div class=" top-4 right-4">
                            <span class="bg-yellow-500 text-white rounded px-5 py-1">Activo</span>
                        </div>
                        <br>
                        <div class="top-4 right-4">
                            <h3 class="text-2xl font-bold">{{$event->name}}{{$event->id}}</h3>
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-3/10 flex justify-end">
                                <img src="path-to-logo.png" alt="Logo" class="h-16 w-16 rounded-full">
                            </div>
                            <div class="w-7/10">
                                <p class="text-lg mt-2 flex items-center"><span class="material-icons">{{ \Carbon\Carbon::parse($event->date)->locale('es')->isoFormat('DD [de] MMMM [de] YYYY') }}</p>
                                <p class="text-lg mt-2 flex items-center"><span class="material-icons font-bold">{{$event->locality}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative_buton mt-4 flex items-center justify-center">
                    <a href="{{ route('evento.completarpago', ['id' => $event->id]) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md">
                        Completar pago
                    </a>
                </div>
            @endforeach
            <div class="relative mt-6 grid grid-cols-1 gap-6 md:grid-cols-2">
                @foreach($participantes as $part)
                <div class="participant-card blur bg-white p-4 rounded-lg shadow-md">
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
                            Icono de corazon
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
