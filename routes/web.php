<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax\ProfileController;
use App\Http\Controllers\Ajax\CardsSendController;
use App\Http\Controllers\Ajax\UsersListController;

Route::namespace('App\Http\Controllers')->group(function () {
    Auth::routes();
});

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'app')->name('home');
    Route::view('/home', 'app')->name('home');
    Route::view('/users', 'app')->name('home');
    Route::view('/profile', 'app')->name('home');

    Route::view('/cards/create', 'app')->name('home');

    Route::get('ajax/users', UsersListController::class)->name('ajaxUsersList');
    Route::get('ajax/profile', ProfileController::class)->name('ajaxProfile');

    Route::get('ajax/cards/send', CardsSendController::class)->name('ajaxCardSend');
});