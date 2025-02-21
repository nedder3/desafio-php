@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Usuario</h1>

    <!-- Muestra errores de validación si los hay -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        
        <div>
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
        </div>

        <div>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password">
        </div>

        <button type="submit">Guardar</button>
    </form>
@endsection
