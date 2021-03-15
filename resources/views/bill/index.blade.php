<x-app-layout>
    <x-slot name="header">
        <div class="md:w-3/4">
            <div class="max-w-4xl mx-auto md:flex flex-wrap	">
                <div
                    class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-2 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col ">
                    <div class="w-full flex-grow mb-2">
                        <div style="padding-top: 0.1em; padding-bottom: 0.1rem"
                            class="text-xs px-3 bg-blue-200 text-blue-800 rounded-full mb-10">Factura</div>
                        <h5 class="font-bold text-m mb-1">Usuario: {{Auth::user()->name}} </h5>
                        <h5 class="font-bold text-m mb-5">Email: {{Auth::user()->email}} </h5>
                        <h5 class="text-center font-bold text-2xl mb-5">Servicios a pagar</h5>
                        @foreach (Auth::user()->packages as $package)
                        <div class="w-full ">
                            <div class="w-full flex-grow mb-2 ">
                                <p class="leading-tight mb-2 text-green-500 font-bold mb-2">
                                    Adquirido</p>
                                <div style="padding-top: 0.1em; padding-bottom: 0.1rem"
                                    class="text-xs px-3 bg-indigo-200 text-indigo-800 rounded-full mb-5">Paquete {{$package->id}}</div>
                                <p class="leading-tight mb-2 text-indigo-800 font-bold">
                                    Servicios</p>
                                @foreach ($package->services as $service)
                                    <p class="leading-tight">
                                        {{ $service->type }} {{ $service->option }} <span
                                            class="leading-tight font-bold"> $ {{ $service->price }}</span>
                                    </p>
                                @endforeach
                                <p class="leading-tight mt-2 mb-2 text-indigo-800 font-bold">
                                    Planes</p>
                                @foreach ($package->plans as $plan)
                                    <p class="leading-tight">{{ $plan->name }} <span class="leading-tight font-bold">
                                            $
                                            {{ $plan->price }}</span>
                                    </p>
                                    <p class="leading-tight mt-2">Incluye
                                    </p>
                                    @foreach ($plan->channels as $channel)
                                        <p class="leading-tight">{{ $channel->name }} <span
                                                class="leading-tight font-bold">
                                                $
                                                {{ $channel->price }}</span>
                                        </p>
                                    @endforeach
                                @endforeach
                                <h5 class="font-bold text-lg mb-7">Subtotal: ${{ $package->price }}</h5>
                            </div>
                        </div>
                        <h6 class="invisible">{{$price+=$package->price}}</h6>
                    @endforeach
                    
                    <h3 class="font-bold text-2xl mb-7">Total: ${{ $price }}</h3>
                      
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
