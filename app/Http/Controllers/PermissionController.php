<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TeamUser;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Ramsey\Uuid\Nonstandard\UuidV6;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class PermissionController extends Controller
{
    public function index()
    {
        // show all permissions
        // Permission::findOrCreate('admin.update');
        // auth()->user()->givePermissionTo('admin.update');
        $roles = Role::where('team_id', session('team_id'))->get();
        $permissions = Auth::user()->getPermissionNames();

        $users = TeamUser::where('team_id', session('team_id'))->with(['team', 'user'])->get();

        return view('permissions.index', compact('permissions', 'roles', 'users'));
    }

    public function all(Permission $permissions)
    {
        $permissions = $permissions->where('guard_name', 'web')->select(['id', 'name', 'display_name'])->get();
        return view('permissions.all', compact('permissions'));
    }

    public function edit($id)
    {
        // $role = Role::find($id);
        // if (is_null($role)) {
        //     return redirect()->route('permission.index')->with('alert', tr('Role not found.'));
        // }

        $role = Role::findByName($id);

        $permissions = $role->permissions;

        $role = (object)[
            'id' => $role->id,
            'name' => $role->name,
            'permissions' => $permissions
        ];

        return view('permissions.edit', compact('role'));
    }

    public function createRole(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
        ]);

        $status = 0;
        try {
            Role::create([
                'display_name' => $request->name,
                'name' => UuidV6::uuid6()->toString(),
                'team_id' => session('team_id')
            ]);
            $status = 1;
        } catch (RoleAlreadyExists $e) {
            unset($e);
            $status = 0;
        }

        return response()->json([
            'status' => $status,
            'data' => null
        ]);
    }

    public function deleteRole($id)
    {
        Role::find($id)->delete();

        return response()->json([
            'status' => 1,
            'data' => null
        ]);
    }

    public function givePermissionToRole($name, Request $request)
    {
        $this->validate($request, [
            'permission_name' => 'required'
        ]);

        $status = 1;
        try {
            Role::findByName($name)->givePermissionTo($request->permission_name);
            $data = 1;
        } catch (PermissionDoesNotExist $e) {
            $status = 0;
            $data = $e->getMessage();
        }

        return response()->json([
            'status' => $status,
            'data' => $data,
        ]);
    }

    public function givePermissionToUser(Request $request, User $user)
    {
        $this->validate($request, [
            'permission_name' => 'required'
        ]);

        $user->givePermissionTo($request->permission_name);

        return response()->json([
            'status' => 1,
        ]);
    }

    public function user_role_and_permission(User $user)
    {
        $roles = $user->getRoleNames();
        // dd($roles);
        $permissions = $user->getDirectPermissions();
        // dd($permissions);

        return view('permissions.user', compact('permissions', 'roles', 'user'));
    }

    public function assignRoleToUser(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $user->assignRole($request->name);

        return response()->json([
            'status' => 1,
        ]);
    }

    public function revokePermissionFromRole(Request $request, Role $role)
    {
    }

    public function deleteRoleFromUser(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $user->removeRole($request->name);

        return response()->json([
            'status' => 1
        ]);
    }

    public function deletePermissionFromUser(User $user, Permission $permission)
    {
        $user->revokePermissionTo($permission->name);

        return response()->json([
            'status' => 1
        ]);
    }
}
