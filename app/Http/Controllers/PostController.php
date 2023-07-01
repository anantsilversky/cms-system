<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->hasAccess('Admin')){
            $posts = Post::paginate(10);
            return view('admin.posts.view', compact('posts'));
        }
        $posts = $user->posts()->paginate(10);
        return view('user.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user->hasAccess('Admin')){
            return view('admin.posts.create');
        }
        return view('user.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $image = basename($request->image->store('public/images'));
        Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image
        ]);
        return redirect(route('posts.index'))->with('success', 'Post created successfully !');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user = Auth::user();
        if($user->hasAccess('Admin')){
            return view('admin.posts.show', compact('post'));
        }
        return view('user.posts.blog-post', compact('post')); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('view', $post);
        $user = Auth::user();
        if($user->hasAccess('Admin')){
            return view('admin.posts.edit', compact('post'));
        }   
        return view('user.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $image = basename($request->image->store('public/images'));
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image
        ]);
        return redirect(route('posts.index'))->with('success', 'Post updated successfully !'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect(route('posts.index'))->with('deleted', 'Post deleted successfully !');
    }

    
}
