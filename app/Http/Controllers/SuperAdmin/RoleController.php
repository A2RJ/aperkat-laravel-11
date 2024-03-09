<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        return view('role.index');
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $form = $request->all();
        Role::create($form);
    }

    public function show(Role $role)
    {
        return view('role.show', compact('role'));
    }

    public function edit(Role $role)
    {
        return view('role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $form = $request->all();
        $role->update($form);
        return redirect()->route('')->with('success', '');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('')->with('success', '');
    }
}
