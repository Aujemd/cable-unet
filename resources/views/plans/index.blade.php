<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight mb-10">
            Planes
        </h1>
        <h3 class="font-semibold text-gray-800 leading-tight">
            Creación de Planes
        </h3>
        <form action="http://localhost:8000/plans" method="POST">
            @csrf
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input required type="text" name="name" id="name"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="Plan Sayajin, plan Polarni, plan quedate en casa ...">
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="type" class="block text-sm font-medium text-gray-700">Canales</label>
                            @foreach ($channels as $channel)
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-indigo-600"
                                    name="channel{{ $channel->id }}" value="{{ $channel->id }}"><span
                                    class="ml-2 text-gray-700">{{ $channel->name }}
                                </span>
                            @endforeach
                        </div>
                        <a href="/channels" class="text-indigo-600">
                            Ver canales más ...
                        </a>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Crear Plan
                        </button>
                    </div>
                </div>
        </form>
        <h3 class="font-semibold text-gray-800 leading-tight">
            Planes creados
        </h3>
        <div class="md:w-3/4">
            <div class="max-w-4xl mx-auto md:flex">
                @foreach ($plans as $plan)
                    <div
                        class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-2 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col">
                        <div class="w-full flex-grow mb-2">
                            <div style="padding-top: 0.1em; padding-bottom: 0.1rem"
                                class="text-xs px-3 bg-red-200 text-red-800 rounded-full mb-10">Plan</div>
                            <h5 class="text-center font-bold text-4xl mb-5">${{ $plan->price }}</h5>
                            <p class="leading-tight font-bold">{{ $plan->name }}</p>
                            @foreach ($plan->channels as $channel)
                                <p class="leading-tight">
                                    {{ $channel->name }}
                                    <span class="leading-tight font-bold">
                                        $ {{ $channel->price }} </span>
                                </p>
                            @endforeach

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-app-layout>
