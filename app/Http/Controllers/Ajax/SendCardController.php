<?php

namespace App\Http\Controllers\Ajax;

use App\GreetingCard;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SendCardController
{
    function __invoke()
    {
        $attributes = validator(request()->all(), [
            'to'        => ['required', 'exists:users,id'],
        ], [
            'to.required' => 'Please select Use to send to.'
        ])->validate();

        try {
            $file = process_base_64_file(request()->card);
            $cardFile = 'uploads/' .$file['fileName'];

            Storage::disk('public')->put($cardFile, base64_decode($file['file']));

            $greetingCard = GreetingCard::create([
                'from'      => Auth::user()->id,
                'to'        => $attributes['to'],
                'card_file' => $cardFile
            ]);

            return json_response($greetingCard, 201);
        } catch (\Throwable $th) {
            Log::debug($th);
            json_response($th->getMessage(), 500);
        }

    }
}
