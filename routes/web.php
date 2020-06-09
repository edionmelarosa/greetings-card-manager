<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax\ProfileController;
use App\Http\Controllers\Ajax\ReceivedCardsController;
use App\Http\Controllers\Ajax\SendCardController;
use App\Http\Controllers\Ajax\SentCardsController;
use App\Http\Controllers\Ajax\UsersListController;

Route::namespace('App\Http\Controllers')->group(function () {
    Auth::routes();
});

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'app');
    Route::view('/home', 'app');
    Route::view('/users', 'app');
    Route::view('/profile', 'app');

    Route::view('/cards/create', 'app');
    Route::view('/cards/sent', 'app');
    Route::view('/cards/received', 'app');

    Route::get('ajax/users', UsersListController::class)->name('ajaxUsersList');
    Route::get('ajax/profile', ProfileController::class)->name('ajaxProfile');

    Route::post('ajax/cards/send', SendCardController::class)->name('ajaxSendCard');
    Route::get('ajax/cards/sent', SentCardsController::class)->name('ajaxSendCards');
    Route::get('ajax/cards/received', ReceivedCardsController::class)->name('ajaxReceivedCards');
});