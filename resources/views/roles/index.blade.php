@extends('layouts.app')

@section('content')
    <h1>Listado de Roles</h1>

    <!-- Botón para crear un nuevo rol -->
    <a href="{{ route('roles.create') }}">Crear Rol</a>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $role->id) }}">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
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
