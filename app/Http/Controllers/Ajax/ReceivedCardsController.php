<?php

namespace App\Http\Controllers\Ajax;

use App\GreetingCard;
use Illuminate\Support\Facades\Auth;

class ReceivedCardsController
{
    function __invoke()
    {
        $receivedCards = GreetingCard::with('from')
            ->where('to', Auth::user()->id)
            ->get();

        return json_response($receivedCards);
    }
}
