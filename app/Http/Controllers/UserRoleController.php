<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Muestra todos los roles que tiene un usuario en particular.
     */
    public function index(User $user)
    {
        // Cargamos los roles del usuario
        // (podrías usar eager loading con ->load('roles') si gustas)
        $roles = $user->roles; 
        return view('user_roles.index', compact('user','roles'));
    }

    /**
     * Muestra el formulario para asignar un nuevo rol al usuario.
     */
    public function create(User $user)
    {
        // Traemos todos los roles disponibles para poder elegir
        $allRoles = Role::all();
        return view('user_roles.create', compact('user','allRoles'));
    }

    /**
     * Asigna un rol seleccionado al usuario.
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id'
        ]);

        $user->roles()->attach($request->role_id);

        return redirect()
            ->route('users.roles.index', $user->id)
            ->with('success','Rol asignado al usuario con éxito.');
    }

    /**
     * (Opcional) Si quisieras mostrar detalle de la relación,
     * por ejemplo si la pivote guarda alguna columna extra.
     */
    public function show(User $user, Role $role)
    {
        // Ejemplo: Si la tabla pivote guardara "fecha_asignacion", podrías mostrarla
        // $pivotData = $user->roles()->where('role_id', $role->id)->first()->pivot;
        return view('user_roles.show', compact('user','role'));
    }

    /**
     * (Opcional) Formulario para editar algo de la relación pivote, 
     * si es que hay datos extra en la tabla role_user (e.g. "start_date").
     */
    public function edit(User $user, Role $role)
    {
        // Similar a create, pero cargando la data pivote
        return view('user_roles.edit', compact('user','role'));
    }

    /**
     * (Opcional) Actualiza la relación, si la tabla pivote tiene columnas extras.
     */
    public function update(Request $request, User $user, Role $role)
    {
        // if you have extra pivot columns to update, you'd do it here...
        // $user->roles()->updateExistingPivot($role->id, [...]);
        
        return redirect()->route('users.roles.index', $user->id)
                         ->with('success','Relación actualizada con éxito.');
    }

    /**
     * Elimina un rol asignado del usuario (detach en la pivote).
     */
    public function destroy(User $user, Role $role)
    {
        $user->roles()->detach($role->id);

        return redirect()
            ->route('users.roles.index', $user->id)
            ->with('success','Rol removido del usuario con éxito.');
    }
}
