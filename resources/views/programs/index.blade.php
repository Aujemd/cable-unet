<x-app-layout>
    <x-slot name="header">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h1 class="font-semibold text-xl text-gray-800 leading-tight mb-10">
            Programas de Canales
        </h1>
        <table class="table-fixed border-separate border container mx-auto rounded">
            <tbody>
            @foreach($channels as $channel)
                <tr>
                    <td class="text-center">{{$channel->name}}</td>
                    <td>                      
                        <a href="{{ route('schedule.show',$channel->name) }}"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Ver Programacion
                        </a>                       
                    </td>
                    <td>                       
                        <a href="{{ route('programs.edit',$channel->name) }}"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Agregar programacion
                        </a>                      
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>