<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax\ProfileController;
use App\Http\Controllers\Ajax\ReceivedCardsController;
use App\Http\Controllers\Ajax\SendCardController;
use App\Http\Controllers\Ajax\SentCardsController;
use App\Http\Controllers\Ajax\UsersListController;

Route::middleware(['auth'])->group(function () {
    $url = request()->getRequestUri();

    if (!preg_match("/ajax/", $url)) {
        Route::view($url, 'app');
    }

    Route::get('ajax/users', UsersListController::class)->name('ajaxUsersList');
    Route::get('ajax/profile', ProfileController::class)->name('ajaxProfile');

    Route::post('ajax/cards/send', SendCardController::class)->name('ajaxSendCard');
    Route::get('ajax/cards/sent', SentCardsController::class)->name('ajaxSendCards');
    Route::get('ajax/cards/received', ReceivedCardsController::class)->name('ajaxReceivedCards');
});

Route::namespace('App\Http\Controllers')->group(function () {
    Auth::routes();
});