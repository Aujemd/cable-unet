<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-10">
            Panel administrativo
        </h2>
        @if (!Auth::user()->isAdmin)
            <h3 class="font-semibold text-gray-800 leading-tight">
                Paquetes disponibles
            </h3>
            <form action="http://localhost:8000/dashboard" method="POST">
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        Añadir a subscritos
                    </button>
                </div>
                @csrf
                <div class="md:w-3/4">
                    <div class="max-w-4xl mx-auto md:flex flex-wrap	">
                        @foreach ($packages as $package)
                            <div
                                class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-2 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col">
                                <div class="w-full flex-grow mb-2">
                                    <input type="text" name="user_id" value="{{ Auth::user()->id }}"
                                        style="display: none" />
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600 mb-3"
                                        name="package{{ $package->id }}" value="{{ $package->id }}"> <span
                                        class="text-green-500">Añadir</span>
                                    <div style="padding-top: 0.1em; padding-bottom: 0.1rem"
                                        class="text-xs px-3 bg-indigo-200 text-indigo-800 rounded-full mb-10">Paquete
                                    </div>
                                    <h5 class="text-center font-bold text-4xl mb-5">${{ $package->price }}</h5>
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
                                        <p class="leading-tight">{{ $plan->name }} <span
                                                class="leading-tight font-bold">
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

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </form>
            <h3 class="font-semibold text-gray-800 leading-tight mb-10 mt-10">
                Paquetes adquiridos
            </h3>
            <a href="/changes" style="margin-left: 85%" type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Solicitar cambio
            </a>
            <div class="md:w-3/4">
                <div class="max-w-4xl mx-auto md:flex flex-wrap	">
                    @foreach (Auth::user()->packages as $package)
                        <div
                            class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-2 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col">
                            <div class="w-full flex-grow mb-2">
                                <p class="leading-tight mb-2 text-green-500 font-bold mb-2">
                                    Adquirido</p>
                                <div style="padding-top: 0.1em; padding-bottom: 0.1rem"
                                    class="text-xs px-3 bg-indigo-200 text-indigo-800 rounded-full mb-10">Paquete</div>
                                <h5 class="text-center font-bold text-4xl mb-5">${{ $package->price }}</h5>
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
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </x-slot>
</x-app-layout>
