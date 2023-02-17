<x-app>
    <div class="card mx-5  my-5">
        <div class="card-header d-flex">
            <h3>Users</h3>
            <a href="{{route('user.create')}}" class="btn btn-outline-warning ms-auto">Crear usuario</a>
        </div>
        <div class="card-body">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td class="d-flex" >
                            <a href="{{route('user.edit', ['user' => $user->id])}}" class="btn btn-info mx-2">Editar</a>
                            <form action="{{route('user.delete', ['user' => $user->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-secondary">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app>
