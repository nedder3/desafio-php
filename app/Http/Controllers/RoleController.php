<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // 1. Listar roles
    public function index()
    {
        // Obtiene todos los roles
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    // 2. Mostrar formulario de creación
    public function create()
    {
        return view('roles.create');
    }

    // 3. Guardar un nuevo rol
    public function store(Request $request)
    {
        // Validar datos de entrada
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        Role::create([
            'name' => $request->name
        ]);

        return redirect()->route('roles.index')
                         ->with('success','Rol creado exitosamente.');
    }

    // 4. Mostrar un rol (opcional si quieres vista de detalle)
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    // 5. Mostrar formulario de edición
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    // 6. Actualizar un rol
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return redirect()->route('roles.index')
                         ->with('success','Rol actualizado exitosamente.');
    }

    // 7. Eliminar rol
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')
                         ->with('success','Rol eliminado exitosamente.');
    }
}

