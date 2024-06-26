<div>
    <div class="card_eventos bg-white">

        <div class="card_eventos_wrapper">
            <div class="card_eventos_container flex flex-col lg:flex-row">
                <div class="card_eventos_left flex items-center">
                    <div class="ml-4">
                        <div class="card_eventos_details flex flex-col eventos-title items-center">
                            <p id="name">{{$title}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card_eventos_img" id="banner">
            <div class="logo_principal">
                <img src="{{$imagen}}" alt="Logo">
            </div>
        </div>

        <div class="card_eventos_wrapper flex-col md:flex-row">
            <div class="card_eventos_container flex flex-col md:flex-row">
                <div class="card_eventos_left flex items-center">
                    <img id="logo" src="{{$profile}}" alt="Logo empresa" width="50" height="50" class="rounded-full">
                    <div class="ml-4">
                        <div class="card_eventos_details flex flex-col">
                            <p class="fecha_event" id="date">{{$fecha}}</p>
                            <p class="eventos-title" id="place">{{$localidad}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>                 

    </div>
</div>