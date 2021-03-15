<x-app-layout>
    <x-slot name="header">
        <form action="http://localhost:8000/changes" method="POST">
            @csrf
            <input type="text" name="user_id" value="{{ Auth::user()->id }}" style="display: none" />
            <div class="max-w mx-auto md:flex">
                <select id="change" name="change" required
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach (Auth::user()->packages as $package)
                        @if ($package->id == Auth::user()->change)
                            <option value="{{ $package->id }}">Paquete ${{ $package->price }} (Pendiente)</option>
                        @else
                            <option value="{{ $package->id }}">Paquete ${{ $package->price }}</option>
                        @endif
                    @endforeach
                </select>
                <button type="submit"
                    class=" ml-5 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-500 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Solicitar cambio
                </button>
            </div>
        </form>
    </x-slot>
</x-app-layout>
