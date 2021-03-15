<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight mb-10">
            Programas de Canales
        </h1>
        <div class="col-span-6 sm:col-span-3">
            <label for="type" class="block text-sm font-medium text-gray-700">Canales</label>
            <select id="name" name="name" required
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @foreach($channels as $channel)
                <option>{{$channel->name}}</option>
                @endforeach
            </select>
        </div>
    </x-slot>
</x-app-layout>