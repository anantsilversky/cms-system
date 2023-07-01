<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate(10);
        if(isset($_REQUEST['userid'])){
            $user = User::find($_REQUEST['userid']);
            return view('admin.user.permissions', compact('permissions', 'user'));
        }
        return view('admin.permissions.view', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permissions.create');
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
        Permission::create($inputs);
        return redirect(route('permissions.index'))->with('success', 'Permission created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        if(isset($_REQUEST['userid'])){
            $user = User::find($_REQUEST['userid']);
            if($request->has('attach')){
                $user->permissions()->attach($permission);
                return back()->with('success', 'Permission Attached successfully !');
            }
            if($request->has('dettach')){
                $user->permissions()->detach($permission);
                return back()->with('deleted', 'Permission Detached successfully !');
            }
        }else{
            $inputs = $request->validate([
                'name' => 'required',
                'slug' => 'required'
            ]);
            $permission->update($inputs);
            return redirect(route('permissions.index'))->with('success', 'Permission Updated successfully !');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('deleted', 'Permission deleted successfully !');
    }
}
