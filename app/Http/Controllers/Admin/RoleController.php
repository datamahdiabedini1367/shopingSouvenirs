<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.list', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validateForm($request);

        Role::query()->create([
            'name' => $request->get('name_role'),
            'persian_name' => $request->get('persian_name'),
        ]);

        return back()->with('success','نقش با موفقیت ثبت شد');


    }

    protected function validateForm(Request $request)
    {
        return $request->validate([
            'name_role' => ['required'],
            'persian_name' => ['required'],
        ]);

    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $role->load('permissions');
        return view('admin.roles.edit' ,compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'persian_name' => ['required'],
            'permissions'=>['array'],
            'permissions.*'=>['exists:permissions,name'],
        ]);

        $role->update([
            'persian_name' => $request->get('persian_name',$role->persian_name),
        ]);

        $role->refreshPermissions($request->get('permissions',[]) );

        return back()->with('success','ثبت با موفقیت انجام شد');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return back()->with('success','حذف با موفقیت انجام شد');
    }
}


