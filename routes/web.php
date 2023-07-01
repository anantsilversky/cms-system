<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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

Route::middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->middleware('adminLogin')->name('home.index');
    Route::resource('posts', PostController::class);
    Route::resource('users', UserController::class);
});

Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});