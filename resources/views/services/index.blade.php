<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight mb-10">
            Servicios
        </h1>
        <h3 class="font-semibold text-gray-800 leading-tight">
            Creación de servicios
        </h3>
        <form action="services" method="POST">
            @csrf
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="type" class="block text-sm font-medium text-gray-700">Tipo</label>
                            <select id="type" name="type" required
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option>Cable</option>
                                <option>Internet</option>
                                <option>Telefonía</option>
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="option" class="block text-sm font-medium text-gray-700">Opción</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input required type="text" name="option" id="option"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="Tipo A, 500 segundos, plan quedate en casa ...">
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <span
                                    class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    $
                                </span>
                                <input required type="number" name="price" id="price"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="0">
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Crear servicio
                        </button>
                    </div>
                </div>
        </form>
        <h3 class="font-semibold text-gray-800 leading-tight">
            Servicios Creados
        </h3>
        <div class="md:w-3/4">
            <div class="max-w-4xl mx-auto md:flex flex-wrap	">
                @foreach ($services as $service)
                    <div
                        class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-2 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col">
                        <div class="w-full flex-grow mb-2">
                            <div style="padding-top: 0.1em; padding-bottom: 0.1rem"
                                class="text-xs px-3 bg-green-200 text-green-800 rounded-full mb-10">Servicio</div>
                            <h5 class="text-center font-bold text-4xl mb-5">${{ $service->price }}</h5>
                            <p class="leading-tight">
                                {{ $service->type }} </p>
                            <p class="leading-tight">
                                {{ $service->option }} </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-slot>

</x-app-layout>
