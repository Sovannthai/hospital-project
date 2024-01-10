<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function AllRole()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    public function AddRole()
    {
        return view('role.create');
    }

    public function StoreRole()
    {
        $roles = new Role();
        $roles->name = request('name');
        $roles->save();
        return redirect()->route('all_role');
    }
}
