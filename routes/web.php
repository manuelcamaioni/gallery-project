<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as HomeController;
use App\Http\Controllers\Admin\UserController as UserCrudController;
use App\Http\Controllers\Admin\TagController as TagCrudController;
use App\Http\Controllers\Admin\PostController as PostCrudController;
use App\Http\Controllers\Admin\CommentController as CommentCrudController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();


Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('user', UserCrudController::class);
    Route::resource('tag', TagCrudController::class);
    Route::resource('post', PostCrudController::class);
    Route::resource('comment', CommentCrudController::class);
});


Route::get('/', function (){
    return view('auth.register');
});
