<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 1. Listar usuarios
    public function index()
    {
        $users = User::all();   // o User::paginate(10), si quieres paginar
        return view('users.index', compact('users'));
    }

    // 2. Mostrar formulario de creación
    public function create()
    {
        return view('users.create');
    }

    // 3. Guardar un nuevo usuario
    public function store(Request $request)
    {
        // Valida datos
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        // Crea el usuario
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password), // encripta
        ]);

        return redirect()->route('users.index')
                         ->with('success','Usuario creado con éxito.');
    }

    // 4. Mostrar un usuario (opcional)
    public function show(User $user)
    {
        // Si necesitas mostrar un detalle, crea una vista show.blade.php
        return view('users.show', compact('user'));
    }

    // 5. Mostrar formulario de edición
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // 6. Actualizar un usuario
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        // Si enviaron password, encripta y actualiza
        $data = $request->only(['name','email']);
        if($request->filled('password')){
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')
                         ->with('success','Usuario actualizado con éxito.');
    }

    // 7. Eliminar usuario
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
                         ->with('success','Usuario eliminado con éxito.');
    }

    // 8. Asignar rol a usuario (paso extra)
    public function assignRole(Request $request, User $user)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id'
        ]);

        $user->roles()->attach($request->role_id);

        return redirect()->back()->with('success', 'Rol asignado correctamente');
    }
}
