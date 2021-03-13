<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight mb-10">
            Paquetes
        </h1>
        <h3 class="font-semibold text-gray-800 leading-tight">
            Creación de Paquetes
        </h3>
        <form action="http://localhost:8000/packages" method="POST">
            @csrf
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="type" class="block text-sm font-medium text-gray-700">Servicios</label>
                            @foreach ($services as $service)
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600"
                                    name="service{{ $service->id }}" value="{{ $service->id }}"><span
                                    class="ml-2 text-gray-700">{{ $service->type }}
                                    {{ $service->option }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="type" class="block text-sm font-medium text-gray-700">Planes</label>
                            @foreach ($plans as $plan)
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600"
                                    name="plan{{ $plan->id }}" value="{{ $plan->id }}"><span
                                    class="ml-2 text-gray-700">{{ $plan->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Crear Paquete
                        </button>
                    </div>
                </div>
        </form>
        <h3 class="font-semibold text-gray-800 leading-tight">
            Paquetes Creados
        </h3>
        <div class="md:w-3/4">
            <div class="max-w-4xl mx-auto md:flex">
                @foreach ($packages as $package)
                    <div
                        class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-2 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col">
                        <div class="w-full flex-grow mb-2">
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
                                <p class="leading-tight">{{ $plan->name }} <span class="leading-tight font-bold"> $
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
    </x-slot>
</x-app-layout>
