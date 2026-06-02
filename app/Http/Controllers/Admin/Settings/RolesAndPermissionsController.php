<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Ability;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesAndPermissionsController extends Controller
{
   public function roleAbilities(Request $request)
{
    $roles = Role::all();

    $role = null;
    $roleAbilities = [];

    if ($request->role_id) {
        $role = Role::find($request->role_id);
        $roleAbilities = $role
            ? $role->abilities()->pluck('abilities.id')->toArray()
            : [];
    }

    $abilities = Ability::all();

    return view('admin.roles.abilities', compact(
        'roles',
        'role',
        'roleAbilities',
        'abilities'
    ));
}

    public function updateRoleAbilities(Request $request)
{
    $request->validate([
        'role_id' => 'required|exists:roles,id',
        'abilities' => 'array'
    ]);

    $role = Role::findOrFail($request->role_id);

    $role->abilities()->sync($request->abilities ?? []);

    return back()->with('success', 'Permissions updated successfully');
}
}
