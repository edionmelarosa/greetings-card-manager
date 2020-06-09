<?php

namespace App\Http\Controllers\Ajax;

use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController
{
    function __invoke()
    {
        $user = User::select('id', 'name', 'email')
            ->where('id', Auth::user()->id)
            ->withNumberOfCardsSent()
            ->withNumberOfCardsReceived()
            ->first();

        return json_response($user);
    }
}
