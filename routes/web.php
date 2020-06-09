<?php

use App\Http\Controllers\Ajax\UserListController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function () {
    Auth::routes();
});

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'app')->name('home');
    Route::view('/home', 'app')->name('home');
    Route::view('/users', 'app')->name('home');

    Route::get('ajax/users', UserListController::class)->name('ajaxUsersList');
});