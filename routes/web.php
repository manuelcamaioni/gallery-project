<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as HomeController;
use App\Http\Controllers\Admin\UserController as UserCrudController;

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
    // Route::get('/projects/deleted', [AdminController::class, 'deletedIndex'])->name('projects.deleted');
    // Route::post('/projects/deleted/{post}', [AdminController::class, 'restore'])->name('projects.restore');
    // Route::delete('/projects/deleted/{post}', [AdminController::class, 'hardDelete'])->name('projects.hard-delete');
    // Route::resource('/projects', AdminController::class);

});


Route::get('/', function (){
    return view('auth.register');
});
