<?php

namespace App\Http\Controllers\Ajax;

use App\User;

class UserListController
{
    function __invoke()
    {
        $users = User::select('id', 'name', 'email')
            ->otherUsers()
            ->withNumberOfCardsSent()
            ->withNumberOfCardsReceived()
        ->get();

        return json_response($users);
    }
}
