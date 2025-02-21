@extends('layouts.app')

@section('content')
    <h1>Editar Rol</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nombre del Rol:</label>
            <input type="text" name="name" id="name" 
                   value="{{ old('name', $role->name) }}">
        </div>
        <button type="submit">Actualizar</button>
    </form>
@endsection
