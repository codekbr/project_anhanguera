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
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
        Route::put('/users/{id}/active-user', [App\Http\Controllers\UsersController::class, 'activeUser'])->name('users.active');
        Route::get('/users/{id}/find-user', [App\Http\Controllers\UsersController::class, 'findUser'])->name('users.find');
        Route::put('/users/{id}/edit-user', [App\Http\Controllers\UsersController::class, 'editUser'])->name('users.edit');
    });
    Route::get('/user-profile', [App\Http\Controllers\UserProfile::class, 'profile'])->name('user.profile');
    Route::put('/user-profile/{id}/edit-profile', [App\Http\Controllers\UserProfile::class, 'editProfile'])->name('user.profile.edit');
    
  
    Route::post('/groups/create-new-group', [App\Http\Controllers\GroupAdminController::class, 'create'])->name('groups.create');
    Route::put('/groups/{id}/edit-group', [App\Http\Controllers\GroupAdminController::class, 'edit'])->name('groups.edit');
    Route::delete('/groups/{id}/delete-group', [App\Http\Controllers\GroupAdminController::class, 'delete'])->name('groups.delete');


    Route::post('/visibility/new-visibility', [App\Http\Controllers\VisibilitiesController::class, 'create'])->name('visibility.create');
    Route::put('/visibility/{id}/edit-visibility', [App\Http\Controllers\VisibilitiesController::class, 'edit'])->name('visibility.edit');
    Route::get('/visibility/{id}/find-visibility', [App\Http\Controllers\VisibilitiesController::class, 'find'])->name('visibility.find');
    Route::delete('/visibility/{id}/delete-visibility', [App\Http\Controllers\VisibilitiesController::class, 'delete'])->name('visibility.delete');
  
  
    Route::get('/friends', [App\Http\Controllers\FriendsController::class, 'index'])->name('friends.index');
});
