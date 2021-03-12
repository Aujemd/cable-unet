<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight mb-20">
            Paquetes
        </h1>
        <form action="http://localhost:8000/packages" method="POST">
            @csrf
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="type" class="block text-sm font-medium text-gray-700">Servicio</label>
                            @foreach ($services as $service)
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600"
                                    name="service{{ $service->id }}" value="{{ $service->id }}"><span
                                    class="ml-2 text-gray-700">{{ $service->type }}
                                    {{ $service->option }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Guardar
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
                            @foreach ($package->services as $service)
                                <p class="leading-tight">
                                    {{ $service->type }} {{ $service->option }}</p>
                            @endforeach

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-app-layout>
