<x-app-layout>
    <div class="py-7">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!--Contenedor de la página-->

                        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                            <h1>Eventos</h1>
                        </div>
                        @foreach($eventos as $event)
                        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
                            <div class="card_eventos">
                                <div class="card_eventos_img" id="banner">                        
                                </div>
                                <div class="card_eventos_wrapper">
                                    <div class="card_eventos_container">
                                        <div class="card_eventos_left">
                                            <h5 id="name">{{$event->name}}</h5>
                                            <div class="card_eventos_details">
                                                <p id="place">{{$event->locality}}</p>
                                                <p>-</p>
                                                <p id="date">{{$event->date}}</p>
                                            </div>
                                        </div>
                                        <div class="card_eventos_rigth">
                                            <img id="logo" src="img/zprevia_logo.png" alt="Logo empresa" width="50" height="50">
                                        </div>
                                    </div>
                                    <div class="label_button" >
                                        <a href="#">Ver Evento</a>
                                    </div>                        
                                </div>                    
                            </div>
                        </div>
                        @endforeach
            </div>
        </div>
    </div>
</x-app-layout>