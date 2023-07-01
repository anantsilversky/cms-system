<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if(!Auth::user()->hasAccess('Admin')){
            return abort(403);
        }
        return view('admin.index');
    }
}
