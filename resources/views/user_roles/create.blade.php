@extends('layouts.app')

@section('content')
    <h1>Asignar un rol a {{ $user->name }}</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.roles.store', $user->id) }}" method="POST">
        @csrf
        
        <label for="role_id">Selecciona un rol:</label>
        <select name="role_id" id="role_id">
            <option value="">-- Selecciona --</option>
            @foreach($allRoles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>

        <button type="submit">Asignar Rol</button>
    </form>
@endsection
