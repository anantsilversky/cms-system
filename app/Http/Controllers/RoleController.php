<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(10);
        if(isset($_REQUEST['userid'])){
            $user = User::with('roles')->find($_REQUEST['userid']);
            return view('admin.user.roles', compact('roles', 'user'));
        }
        return view('admin.roles.view', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'name' => ['required'],
            'slug' => ['required'],
        ]);
        Role::create($inputs);
        return redirect(route('roles.index'))->with('success', 'Role created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        if(isset($_REQUEST['userid'])){
            $user = User::find($request->userid);
            if($request->has('attach')){
                $user->roles()->attach($role);
                return back()->with('success', 'Role Attached successfully !');
            }
            if($request->has('dettach')){
                $user->roles()->detach($role);
                return back()->with('deleted', 'Role Detached    successfully !');
            }
        }else{
            $inputs = $request->validate([
                'name' => 'required',
                'slug' => 'required'
            ]);
            $role->update($inputs);
            return redirect(route('roles.index'))->with('success', 'Role Updated successfully !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('deleted', 'Role deleted successfully !');
    }
}
