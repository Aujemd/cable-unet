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
        <table class="table-fixed border-separate border container mx-auto rounded">
            <thead>
                <tr>
                <th class="text-xl">Usuario</th>
                <th class="text-xl">Email</th>
                <th class="text-xl">Estado</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            
                <tr>
                    <td class="text-center">{{$user->name}}</td>
                    <td class="text-center">{{$user->email}}</td>
                    @if ($user->isAdmin)
                        <td class="text-center">Administrador</td>
                    @else
                        <td class="text-center">Suscriptor</td>
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