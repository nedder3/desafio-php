@extends('layouts.app')

@section('content')
    <h1>Detalle del Rol</h1>
    <p><strong>ID:</strong> {{ $role->id }}</p>
    <p><strong>Nombre:</strong> {{ $role->name }}</p>
@endsection
