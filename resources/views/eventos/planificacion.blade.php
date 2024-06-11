<x-app-layout>
    <div class="py-7">
        <!--Contenedor de la página-->
        @foreach([$event] as $env)
            <div class=" p-6">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-xl font-bold">PARTICIPANTES</h1>
                    @if($env->price)
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
                @if($env->price)

                @else
                <div class="relative_buton mt-4 flex items-center justify-center">
                    <a href="{{ route('evento.completarpago', ['id' => $event->id]) }}" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md">
                        Completar pago
                    </a>
                </div>
                @endif
            @endforeach
            
            <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-1">
                <div class="bg-white rounded-lg ">
                    @foreach($participantes as $part)
                    <table class="table-auto">
                        <thead>
                            <tr>
                            <th>Song</th>
                            <th>Artist</th>
                            <th>Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                            <td>Malcolm Lockyer</td>
                            <td>1961</td>
                            </tr>
                            <tr>
                            <td>Witchy Woman</td>
                            <td>The Eagles</td>
                            <td>1972</td>
                            </tr>
                            <tr>
                            <td>Shining Star</td>
                            <td>Earth, Wind, and Fire</td>
                            <td>1975</td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
