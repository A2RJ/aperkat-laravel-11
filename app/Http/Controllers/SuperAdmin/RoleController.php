<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleRequest;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::query()->with(['user', 'children:parent_id,role', 'parent'])->paginate();
        $users = User::query()->get(['id', 'name']);
        $supervisors = Role::query()->get(['id', 'role']);
        return view('role.index', compact('roles', 'users', 'supervisors'));
    }

    public function store(RoleRequest $request)
    {
        Role::create($request->safe()->only(['role', 'parent_id', 'user_id']));
        return redirect()->route('role.index')->with('success', 'Success add role ' . $request->role);
    }

    public function show(Role $role)
    {
        return view('role.show', compact('role'));
    }

    public function update(RoleRequest $request, Role $role)
    {


        $role->update($request->safe()->only(['role', 'parent_id', 'user_id']));
        return redirect()->route('role.index')->with('success', 'Success edit role ' . $request->role);
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Success delete role ' . $role->role);
    }
}
