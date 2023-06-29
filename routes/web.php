<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::get('/user/{user}', [HomeController::class, 'show'])->name('users.show');


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::resource('posts', PostController::class);

Route::middleware('auth')->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('users', UserController::class);
});
