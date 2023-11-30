<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function newRole()
    {
        $roles =  Role::with('permissions')->get();
        $permissions =  Permission::all();
        $users =  User::all();
        
        return view('admin.Role_create', [
            'roles' => $roles,
            'permissions' => $permissions,
            'users' => $users,
        ]);
    }

    public function attributPermissionToRole()
    {

        $roles =  Role::with('permissions')->get();
        $permissions =  Permission::all();
        $users =  User::all();
        return view('admin.attribut_permission_role', [
            'roles' => $roles,
            'permissions' => $permissions,
            'users' => $users,
        ]);
    }

    public function attributRoleUser()
    {

        $roles =  Role::with('permissions')->get();
        $permissions =  Permission::all();
        $users =  User::all();
        return view('admin.attribut_role_user', [
            'roles' => $roles,
            'permissions' => $permissions,
            'users' => $users,
        ]);
    }

    public function create_role(Request $request)
    {
        $user = User::find(Auth::user()->idUser);

        // if ($user->hasRole('admin')) {
            $role = $request->role;
            Role::create(['name' => $role]);
            return redirect()->back()->with('success', 'role creer');
        // }
        return redirect()->back()->with('success', 'permission non accordée');
    }

    public function create_permission(Request $request)
    {
        $user = User::find(Auth::user()->idUser);

        // if ($user->hasRole('admin')) {

            $permission = $request->permission;
            $idRole = $request->idRole;
            Permission::create(['name' => $permission]);
            return redirect()->back()->with('success', 'permission creer');
        // }
        return redirect()->back()->with('success', 'permission non accordée');
    }

    public function attach_permission_to_role(Request $request)
    {
        $user = User::find(Auth::user()->idUser);

        // if ($user->hasRole('admin')) {

            $idPermissions = $request->idPermissions;
            $permissionNames = Permission::whereIn('id', $idPermissions)->pluck('name');
            $idRole = intval($request->idRole);
            $role = Role::firstOrCreate(["id" => $idRole]);
            foreach ($permissionNames as $permissionName) {
                $role->givePermissionTo($permissionName);
            }
            return redirect()->back()->with('success', 'attach permissions to a role enregister ');
        // }
        return redirect()->back()->with('success', 'permission non accordée');
    }

    public function attribute_role_to_user(Request $request)
    {
        $user = User::find(Auth::user()->idUser);

        // if ($user->hasRole('admin')) {
            $idUser = $request->idUser;
            $idRoles = $request->idRoles;
            $roleNames = Role::whereIn('id', $idRoles)->pluck('name');
            $user = User::find($idUser);
            foreach ($roleNames as $roleName) {
                $user->assignRole($roleName);
            }
            return redirect()->back()->with('success', 'attribute role to user enregister ');
        // }
        return redirect()->back()->with('success', 'permission non accordée');
    }

    public function getUserRoles()
    {
        $user = User::find(Auth::user()->idUser);
  #      $roles = implode(', ',$user->getRoleNames());
        $roles = $user->getRoleNames();

        return $roles;
    }
}
