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
    Route::group(['users'], function(){
        Route::get('/', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
        Route::put('/{id}/active-user', [App\Http\Controllers\UsersController::class, 'activeUser'])->name('users.active');
    });
    Route::get('/friends', [App\Http\Controllers\FriendsController::class, 'index'])->name('friends.index');
});
