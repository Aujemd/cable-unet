<x-app-layout>
    <x-slot name="header">
        <div class="md:w-3/4">
            <div class="max-w-4xl mx-auto md:flex flex-wrap	">
                <div
                    class="w-full md:w-1/3 md:max-w-none bg-white px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-2 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col">
                    <div class="w-full flex-grow mb-2">
                        <div style="padding-top: 0.1em; padding-bottom: 0.1rem"
                            class="text-xs px-3 bg-blue-200 text-blue-800 rounded-full mb-10">Factura</div>
                        <h5 class="text-center font-bold text-2xl mb-5">Total</h5>
                        <h5 class="text-center font-bold text-4xl mb-5">${{ $price }}</h5>
                        @foreach ($user->packages as $package)
                            <p class="leading-tight">Paquete
                                <span class="font-bold"> ${{ $package->price }}</span>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
