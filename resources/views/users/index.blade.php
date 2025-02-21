@extends('layouts.app')

@section('content')
    <h1>Listado de Usuarios</h1>
    
    <!-- Botón para crear un nuevo usuario -->
    <a href="{{ route('users.create') }}">Crear Usuario</a>

    <table border="1" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.edit', $user) }}">Editar</a>
                </td>
                <td>
                    <!-- Para borrar un usuario se usa un formulario con method DELETE -->
                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
