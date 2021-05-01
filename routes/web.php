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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();
Route::group(['middleware' => 'auth:web' ],function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
    
    Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
    Route::put('/users/{id}/active-user', [App\Http\Controllers\UsersController::class, 'activeUser'])->name('users.active');
    Route::post('/users/{id}/update-group', [App\Http\Controllers\UsersController::class, 'updateGroup'])->name('users.updateGroup');
  
    Route::get('/groups', [App\Http\Controllers\GroupAdminController::class, 'index'])->name('groups.index');
    Route::post('/groups', [App\Http\Controllers\GroupAdminController::class, 'store'])->name('groups.store');
  
    Route::get('/friends', [App\Http\Controllers\FriendsController::class, 'index'])->name('friends.index');
});
