<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfileRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = User::query()->where('id', auth()->user()->id)->first();

        return view('admin.profile.show', compact('user'));

    }

    public function change_role(Request $request, User $user)
    {

        $user->refreshPermissions($request->get('permissions', []));
        $user->refreshRoles($request->get('roles', []));


        return back()->with('success', 'ثبت با موفقیت انجام شد.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $permissions = Permission::all();
        $roles = Role::all();
        $user = $user->load('roles', 'permissions');
        return view('admin.users.edit', compact('user', 'permissions', 'roles', 'user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->refreshPermissions($request->get('permissions', []));

        $user->refreshRoles($request->get('roles', []));


        return back()->with('success', 'ثبت با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'کاربر با موفقیت حذف شد');
    }

    public function update_profile(UpdateProfileRequest $request, User $user)
    {

        $user->update([
            'firstname' => $request->get('firstname', $user->firstname),
            'lastname' => $request->get('lastname', $user->lastname),
            'email' => $request->get('email', $user->email),
            'password' => $request->get('password', $user->password),
            'mobile' => $request->get('mobile', $user->mobile),
        ]);

       return redirect()->back()->with('success' ,'اطلاعات با موفقیت ثبت شد.');
    }
}
