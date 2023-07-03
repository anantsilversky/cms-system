<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $posts = Post::with('user')->paginate(10);
        return view('admin.index', compact('posts'));
    }
}
