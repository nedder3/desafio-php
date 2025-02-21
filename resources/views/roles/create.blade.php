@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Rol</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nombre del Rol:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        <button type="submit">Guardar</button>
    </form>
@endsection
