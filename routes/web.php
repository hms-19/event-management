<?php

use App\Http\Controllers\Admin\UserController;
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
    return view('frontend.home');
});


// Admin Routes

Route::middleware([
    'auth:sanctum',
    'admin-auth',
    config('jetstream.auth_session'),
    'verified'
])->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // users

    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function() {
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{user}','edit')->name('edit');
        Route::patch('/update/{user}','update')->name('update');
        Route::get('/delete/{user}','destroy')->name('delete');
    });

});


// User Auth Routes

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/profile', function () {
        return view('profile.show');
    })->name('profile');
});

