<div class="min-h-screen flex">
    <!-- Mitad izquierda con el logo -->
    <div class="w-1/2 flex items-center justify-center bg-gray-100" style="background-image: url('/assets/imagenes/fondopago.svg'); background-size: cover;">
        <div>
            {{ $logo }}
        </div>
    </div>

    <!-- Mitad derecha con el formulario -->
    <div class="w-1/2 flex flex-col items-center justify-center bg-white">
        {{ $slot }}
    </div>
</div>