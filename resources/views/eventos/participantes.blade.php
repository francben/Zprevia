<x-app-layout>
    <div class="py-4">
        <!--Contenedor de la página-->
        @foreach([$event] as $env)
            <div class=" pl-4">
                <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('eventos.index')}}" class="btnreturn flex items-center space-x-2">
                        <x-icon_back/>
                        <h1 class="text-lg font-semibold">PARTICIPANTES</h1>
                    </a>
                    @if($env->pagado)
                        <a href="{{ route('evento.planificar', ['id' => $event->id]) }}">
                            <button class="inline-flex items-center px-6 py-2 mr-4 bg-verde-800 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-verde-700 focus:bg-verde-700 active:bg-verde-900 focus:outline-none focus:ring-2 focus:ring-verde-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150'">Planificación</button>
                        </a>
                    @else
                        <button class="bg-gray-500 text-white px-6 py-2 mr-4 text-sm rounded-md">Planificación</button>
                    @endif
                </div>
            </div>
            <div class="container mx-auto pr-4 pl-4">
                <div class="bg-white shadow-lg p-0 flex flex-col md:flex-row">
                    <div class="w-full md:w-1/2 flex-shrink-0">
                        <img src="{{ asset($env->banner) }}" alt="{{ $event->name }}" class="w-full h-full md:h-auto object-cover md:object-fill">
                    </div>
                    <div class="w-full md:w-2/3 p-4 relative">
                        <div class="top-4 right-4">
                            <span class="bg-yellow-500 text-white rounded px-5 py-1" style="font-size: 11px;">Activo</span>
                        </div>
                        <br>
                        <div class="top-4 right-4">
                            <h3 class="text-2xl font-bold">{{ $event->name }}</h3>
                        </div>
                        <div class="flex flex-col md:flex-row items-center md:items-start justify-center mt-2 text-center md:text-left">
                            <div class="logo-empre-container flex justify-center items-center">
                                <img src="{{ asset($env->logo) }}" alt="Logo" class="rounded-full">
                            </div>
                            <div class="w-full md:w-7/10 mt-2 md:mt-0 md:ml-4">
                                <p class="text-lg mt-1 flex items-center justify-center md:justify-start">
                                    <span class="text-sm material-icons text-gray-500">
                                        @if (\Carbon\Carbon::parse($event->start_date)->isSameDay(\Carbon\Carbon::parse($event->end_date)))
                                            {{ \Carbon\Carbon::parse($event->start_date)->locale('es')->isoFormat('DD [de] MMMM [de] YYYY') }}
                                        @else
                                            {{ \Carbon\Carbon::parse($event->start_date)->locale('es')->isoFormat('DD') }} al {{ \Carbon\Carbon::parse($event->end_date)->locale('es')->isoFormat('DD [de] MMMM [de] YYYY') }}
                                        @endif
                                    </span>
                                </p>
                                <p class="text-lg mt-1 flex items-center justify-center md:justify-start">
                                    <span class="material-icons font-bold">{{ $event->locality }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div x-data="{
                        openModal: false, 
                        videoUrl: '', 
                        imageUrl: '', 
                        pdfUrl: '', 
                        isVideo: false, 
                        isIMG: false, 
                        isPDF: false,
                        showContent(url, type) {
                            this.isVideo = false;
                            this.isIMG = false;
                            this.isPDF = false;
                            this.videoUrl = '';
                            this.imageUrl = '';
                            this.pdfUrl = '';

                            const imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
                            const fileExtension = url.split('.').pop().toLowerCase();

                            if (type === 'video') {
                                this.isVideo = true;
                                this.videoUrl = url;
                            } else if (type === 'image' || imageExtensions.includes(fileExtension)) {
                                this.isIMG = true;
                                this.imageUrl = url;
                            } else if (type === 'pdf') {
                                this.isPDF = true;
                                this.pdfUrl = url;
                            }

                            this.openModal = true;
                        }
                    }" @keydown.window.escape="openModal = false">

                    <div class="scrollable-div relative bg-white  mt-6 grid grid-cols-1 md:grid-cols-2 content-container h-[calc(100vh-200px)] overflow-hidden">

                        @if($env->pagado)
                            @foreach($participantes as $part)
                                <div class="bg-white p-6 gap-6 rounded-lg shadow-md flex flex-col" style="margin: 20px;">
                                    <div class="flex-grow">
                                        <div class="flex">
                                            <div class="logo-empre-container mr-4">
                                                <img src="{{ asset($part->logo) }}" alt="Logo" class="max-w-full h-auto">
                                            </div>
                                            <div class="info-container  w-full">
                                                <div  class="flex justify-between items-baseline">
                                                    <h4 class="text-sm font-bold">{{ $part->name }}</h4>
                                                    <span class="text-gray-400 text-xs">{{ $part->sector }}</span>
                                                </div>
                                                <p class="text-gray-500 text-xs">{{ $part->locality }}</p>
                                                <h5 class="text-xl font-bold"></h5>
                                                <p class="text-gray-600 text-xs">{{ $part->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer mt-4 flex items-center justify-between">
                                        <div class="buttons flex gap-2">
                                            @if($part->video)
                                                <button @click="showContent('{{ asset($part->video) }}', 'video')" class="texto-butones tracking-wide font-medium bg-verde-800 text-white px-4 py-1 rounded">Video</button>
                                            @endif
                                            @if($part->cover)
                                                <button @click="showContent('{{ asset($part->cover) }}', 'image')" class="texto-butones tracking-wide font-medium bg-verde-800 text-white px-4 py-1 rounded">Dossier</button>
                                            @endif
                                            @if($part->profile)
                                                <button @click="showContent('{{ asset($part->profile) }}', 'pdf')" class="texto-butones tracking-wide font-medium bg-verde-800 text-white px-4 py-1 rounded">Flyer</button>
                                            @endif
                                        </div>
                                        <div class="heart-icon text-gray-200 cursor-pointer">
                                            <button @click="">
                                                <x-hearticon/>
                                            </button>    
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @foreach($participantes as $part)
                                <div class="bg-white p-6 gap-6 rounded-lg shadow-md blur-sm" style="margin: 20px;">
                                    <div class="flex">
                                        <div class="image-container w-3/10">
                                            <img src="{{ asset('path-to-logo.png')}}" alt="Logo" class="h-16 mr-4">
                                        </div>
                                        <div class="info-container w-7/10">
                                            <h4 class="text-xl font-bold">{{ $part->name }}</h4>
                                            <h5 class="text-xl font-bold"></h5>
                                            <p class="text-gray-600">{{ $part->description }}</p>
                                        </div>
                                    </div>
                                    <div class="footer mt-4 flex items-center justify-between">
                                        <div class="buttons flex gap-2">
                                            <span class="bg-gray-500 text-white px-4 py-2 rounded">Video</span>
                                            <span class="bg-gray-500 text-white px-4 py-2 rounded">Dossier</span>
                                        </div>
                                        <div class="heart-icon text-gray-200">
                                            <x-hearticon/>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if(!$env->pagado)
                            <div class="absolute inset-0 flex items-center justify-center z-20">
                                <a href="{{ route('evento.completarpago', ['id' => $event->id]) }}" class="inline-flex justify-center items-center px-4 py-2 bg-verde-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-verde-700 focus:bg-verde-700 active:bg-verde-900 focus:outline-none focus:ring-2 focus:ring-verde-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
                                    Completar pago
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Modal de contenido -->
                    <div x-show="openModal" class="fixed inset-0 flex items-center justify-center z-50 bg-gray-900 bg-opacity-75" x-cloak>
                        <div class="relative bg-black rounded-lg shadow-lg max-w-3xl w-full">
                            <!-- Botón de cierre -->
                            <button @click="openModal = false; videoUrl = ''; imageUrl = ''; pdfUrl = ''; isVideo = false; isIMG = false; isPDF = false;" class="absolute top-0 right-0 mt-4 mr-4 text-gray-300 hover:text-gray-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                            <!-- Contenido del modal -->
                            <div class="p-10">
                                <template x-if="isVideo">
                                    <video x-bind:src="videoUrl" controls class="w-full h-auto rounded-lg">
                                        Tu navegador no soporta la etiqueta de video.
                                    </video>
                                </template>
                                <template x-if="isIMG">
                                    <img x-bind:src="imageUrl" class="w-full h-auto rounded-lg" alt="Imagen">
                                    <div class="absolute bottom-2 right-2 bg-gray-800 bg-opacity-50 text-white text-xs px-2 py-1 rounded">
                                        {{}}
                                    </div>
                                </template>
                                <template x-if="isPDF">
                                    <iframe x-bind:src="pdfUrl" width="100%" height="450px"></iframe>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
        
    </div>
</x-app-layout>
