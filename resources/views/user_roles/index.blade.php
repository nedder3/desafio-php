@extends('layouts.app')

@section('content')
    <h1>Roles del usuario: {{ $user->name }}</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mostrar los roles que ya tiene el usuario -->
    <table border="1" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>Role ID</th>
                <th>Nombre del Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <!-- Form para "detach" -->
                    <form action="{{ route('users.roles.destroy', [$user->id, $role->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Remover Rol</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="3">Este usuario no tiene roles asignados.</td></tr>
        @endforelse
        </tbody>
    </table>

    <a href="{{ route('users.roles.create', $user->id) }}">Asignar nuevo rol</a>
@endsection
