<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});


//Rutas para Users (CRUD)
Route::resource('users', UserController::class);

//Rutas para Roles (CRUD)
Route::resource('roles', RoleController::class);

//Ruta adicional para asignar roles a usuarios
Route::post('users/{user}/roles', [UserController::class, 'assignRole'])
    ->name('users.assignRole');
