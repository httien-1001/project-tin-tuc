<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();


Route::group(['prefix'=> 'admin','middleware' => 'auth', 'as' => 'admin.'],function(){
    Route::resource('', \App\Http\Controllers\AdminController::class);
    Route::resource('role', \App\Http\Controllers\RoleController::class);
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('category', \App\Http\Controllers\CategoryController::class);
    Route::resource('post', \App\Http\Controllers\PostController::class);
    Route::resource('comment', \App\Http\Controllers\ManageCommentColler::class);
});

Route::group(['prefix'=> 'customer','middleware' => 'auth', 'as' => 'customer.'],function(){
    Route::resource('comment', \App\Http\Controllers\CommentController::class);
});


