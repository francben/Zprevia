<x-guest-layout>
    <x-pago-card>            
        @foreach([$evento] as $env)
            @foreach([$company] as $company)
                <x-slot name="logo" class="w-1/2 flex flex-col items-center justify-center">
                    <div class="mb-4 flex flex-col items-center justify-center">
                        <x-card-logo />
                        <br>
                        <h1 class="mb-1" style="font-family:Poppins, sans-serif;font-size:26px;font-weight:900;">{{ __('¡Completa tu participación!') }}</h1>
                    </div>
                    <x-card-event
                        title="{{$env->name}}{{$env->id}}" 
                        imagen="{{ $env->banner }}" 
                        profile="{{ $company->logo }}" 
                        fecha="{{ \Carbon\Carbon::parse($env->date)->locale('es')->isoFormat('DD [de] MMMM [de] YYYY') }}" 
                        localidad="{{$env->locality}}" 
                    />
                    <br>
                    <br>
                    <div class="mb-4 flex flex-col items-center justify-center">
                        <a href="{{ route('evento.participantes', ['id' => $env->id]) }}" class="btnreturn"><x-btnreturn/></a>
                    </div>
                </x-slot>
            @endforeach
       

            @session('status')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ $value }}
                </div>
            @endsession

            <form method="POST" action="{{ route('login') }}">
                @csrf
                {{--<div class="block mt-4 mx-auto">
                    <x-button style="font-family:Poppins, sans-serif;font-weight:900;" class="flex w-full justify-center bg-verde-600 rounded-md text-white" >
                        {{ __('Pagar con Paypal') }}
                    </x-button>
                </div>
                <br>
                <x-tarjeta-pago/>--}}
                <div class="block mt-4 mx-auto">
                    <h5 style="font-family: Inter, sans-serif; font-weight: 700; font-size: 17px; color: #6c757d;">
                        {{ __('Email') }}
                    </h5>
                </div>
                <div class="relative">
                    <x-input style="font-family:Poppins, sans-serif;font-size:14px; padding-left: 2.5rem;" id="email" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block mt-1 w-full pl-10" type="email" name="email" :value="old('email')" required autofocus placeholder=""/>
                </div>

                <div class="block mt-4 mx-auto">
                    <h4 style="font-family: Arial, sans-serif; font-weight: 700; font-size: 17px; color: #6c757d;">
                        {{ __('Datos de tarjeta') }}
                    </h4>
                </div>
                <!-- Credit Card Input Form -->
                <div class=" mt-4">
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" id="card-number" name="card-number" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block mt-1 w-full pl-10" placeholder="1234 1234 1234 1234" maxlength="19" required>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <x-cards/>
                        </div>
                    </div>
                    <div class="flex mt-2">
                        <div class="w-1/2 pr-1">
                            <input type="text" id="expiry-date" name="expiry-date" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md block w-full" placeholder="MM / AA" maxlength="5" required>
                        </div>
                        <div class="w-1/2 pl-1">
                            <input type="text" id="cvc" name="cvc" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md block w-full" placeholder="CVC" maxlength="4" required>
                        </div>
                    </div>
                </div>


                <div class="block mt-4 mx-auto">
                    <h5 style="font-family: Inter, sans-serif; font-weight: 700; font-size: 17px; color: #6c757d;">
                        {{ __('Nombre en tarjeta') }}
                    </h5>
                </div>
                <div class="relative">
                    <x-input style="font-family:Poppins, sans-serif;font-size:14px; padding-left: 2.5rem;" id="nametarjeta" class="border-gris-300 focus:border-gris-500 focus:ring-gris-500 rounded-md shadow-sm block mt-1 w-full pl-10" type="text" name="email" :value="old('')" required placeholder=""/>
                </div>


                <div class="block mt-4 mx-auto">
                    <h5 style="font-family: Inter, sans-serif; font-weight: 700; font-size: 17px; color: #6c757d;">
                        {{ __('País y région') }}
                    </h5>
                </div>
                <div class="relative">
                    <div class="relative">
                        <x-inputselect :options="$options"/>
                    </div>           
                </div>
                
                
                <div class="block mt-4 mx-auto">
                    <x-button style="font-family:Poppins, sans-serif;font-weight:900;" class="flex w-full justify-center bg-verde-600 rounded-md text-white" >
                        {{ __('Pagar €') }}{{$env->price}}
                    </x-button>
                </div>
            </form>
        @endforeach
    </x-pago-card>
</x-guest-layout>
