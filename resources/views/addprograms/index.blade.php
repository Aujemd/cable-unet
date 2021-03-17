<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight mb-10">
            Agregar Programa a {{$name}}
        </h1>
        <div class="mx-auto flex justify-center	">
            <div class="">
                <form action="{{ route('programs.update',$name) }}" class="mx-auto" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Nombre*</label>
                        <input type="text" name="program" class="rounded m-6" required>
                    </div>
                    <div class="form-group">
                        <label>Numero de dia de la semana*</label>
                        <input type="number" class="rounded m-6" name="day" min="1" max="7"required>
                    </div>
                    <div class="form-group">
                        <label>Hora(militar) de inicio*</label>
                        <input type="number" class="rounded m-6" name="start" min="1" max="24" required>
                    </div>
                    <div class="form-group">
                        <label>hora(militar) de fin*</label>
                        <input type="number" class="rounded m-6" name="end" min="1" max="24" required>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        @csrf
                        @method('PUT')
                        <input type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" value="Agregar">
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>