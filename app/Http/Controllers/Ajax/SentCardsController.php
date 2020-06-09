<?php

namespace App\Http\Controllers\Ajax;

use App\GreetingCard;
use Illuminate\Support\Facades\Auth;

class SentCardsController
{
    function __invoke()
    {
        $sentCards = GreetingCard::with('to')
            ->where('from', Auth::user()->id)
            ->get();

        return json_response($sentCards);
    }
}
