<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class,'index'])->name('home');


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

    // event

    Route::controller(EventController::class)->prefix('events')->name('events.')->group(function() {
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{event}','edit')->name('edit');
        Route::patch('/update/{event}','update')->name('update');
        Route::get('/delete/{event}','destroy')->name('delete');
    });

    // announcements

    Route::controller(AnnouncementController::class)->prefix('announcements')->name('announcements.')->group(function() {
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/edit/{announcement}','edit')->name('edit');
        Route::patch('/update/{announcement}','update')->name('update');
        Route::get('/delete/{announcement}','destroy')->name('delete');
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

