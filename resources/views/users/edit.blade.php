@extends('layouts.app')

@section('content')
    <h1>Editar Usuario</h1>

    <!-- Muestra errores de validación -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- IMPORTANTE: method="POST" y luego directiva @method('PUT') para actualizar -->
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}">
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}">
        </div>

        <!-- Solo si quieres cambiar password -->
        <div>
            <label for="password">Contraseña (opcional):</label>
            <input type="password" name="password" id="password">
        </div>

        <button type="submit">Actualizar</button>
    </form>
@endsection
