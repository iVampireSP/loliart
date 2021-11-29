<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use App\Models\Permission as Permissions;

class PermissionController extends Controller
{
    public function index(Permissions $permissions)
    {
        // show all permissions
        // Permission::findOrCreate('admin.update');
        // auth()->user()->givePermissionTo('admin.update');
        $permissions = Auth::user()->getPermissionNames();
        return view('permissions.index', compact('permissions'));
    }

    public function all(Permission $permissions)
    {
        $permissions = $permissions->select(['id', 'name', 'display_name'])->get();
        return view('permissions.all', compact('permissions'));
    }
}
