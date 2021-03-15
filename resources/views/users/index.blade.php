<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Usuarios Registrados
        </h2>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <br>
        <table class="table-auto border-separate border container mx-auto rounded">
            <tbody>
            @foreach($users as $user)
            
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @if ($user->isAdmin)
                        <td>Administrador</td>
                    @else
                        <td>Suscriptor</td>
                    @endif
                    <!-- <td>
                    <a href="" class="">Editar</a>
                    </td> -->
                    
                    @if (Auth::user()->email != $user->email)
                    <td>
                        <form action="{{ route('users.destroy',$user)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input 
                                type="submit" 
                                value="Eliminar" 
                                class="bg-red-600 text-white rounded m-1.5 p-1.5"
                                onclick="return confirm('Borrar Usuario?')"
                            >
                        </form>
                    </td>
                    @endif
                    @if(!$user->isAdmin)
                    <td>
                        <form action="{{ route('users.update',$user)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input 
                                type="submit" 
                                value="Hacer Admin" 
                                class="text-white bg-blue-600 rounded m-1.5	p-1.5"
                                onclick="return confirm('Hacer admin?')"
                            >
                        </form>
                    </td>
                    @endif
                    @if($user->isAdmin && Auth::user()->email != $user->email)
                    <td>
                    <form action="{{ route('users.update',$user)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input 
                                type="submit" 
                                value="Quitar Admin" 
                                class="text-white bg-blue-600 rounded m-1.5	p-1.5"
                                onclick="return confirm('Quitar admin?')"
                            >
                        </form>
                    </td>
                    @endif
                    @if (Auth::user()->email == $user->email)
                        <td>Usuario Actual</td> 
                    @endif
                </tr>
               
            @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app-layout>