<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasAccess('Admin')){
            $users = User::where('id', '<>',  Auth::user()->id)->paginate(10);
            return view('admin.user.index', compact('users'));
        }   
        return abort(403);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if(Auth::user()->hasAccess('Admin')){
            return view('admin.profile.profile', compact('user'));
        }
        elseif(Auth::user()->id == $user->id){
            return view('user.profile', compact('user'));
        }
        return abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('view', $user);
        if(Auth::user()->hasAccess('Admin')){
            return view('admin.profile.edit', compact('user'));
        }
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        if($request->has('image')){
            $image = basename($request->image->store('public/images'));
            $user->profile_image = $image;
        }
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->age = $request->age;
        if($request->filled('password')){
            $user->password = $request->password;
        }
        $user->save();
        return redirect(route('users.show', $user))->with('success', 'Profile updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return redirect(route('users.index'))->with('deleted', 'User deleted successfully !');
    }
}
