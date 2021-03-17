<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Programacion de la semana en {{$name}}
        </h2>
        <br>
        <div class="grid grid-cols-7 border-separate border container mx-auto rounded auto-rows-auto">
            <div class="text-2xl">lunes</div>
            <div class="text-2xl">martes</div>
            <div class="text-2xl">miercoles</div>
            <div class="text-2xl">jueves</div>
            <div class="text-2xl">viernes</div>
            <div class="text-2xl">sabado</div>
            <div class="text-2xl">domingo</div>

            @foreach($program as $prog)
                @if($prog->channel == $name)
                    @for ($i = 1; $i < 8; $i++)
                        @if($prog->day == $i )                          
                            <div class="grid row-start-{{$prog->end}} row-end-{{$prog->end}} col-start-{{$i}} col-end-{{$i}}"> 
                                {{$prog->name}}. (Hora:{{$prog->start}}-{{$prog->end}}) 
                                
                                <form action="{{ route('schedule.destroy', $prog->id) }}" class="text-center " method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input 
                                    type="submit" 
                                    value="Eliminar" 
                                    class="bg-red-600 text-white rounded "
                                    onclick="return confirm('Borrar Programa?')"
                                    >
                                </form>
                            </div>
                        @endif
                    @endfor
                @endif
            @endforeach
            <!-- <div class="grid row-start-2 row-end-2 col-start-2 col-end-2"> aber</div> -->
        </div>
    </x-slot>
</x-app-layout>