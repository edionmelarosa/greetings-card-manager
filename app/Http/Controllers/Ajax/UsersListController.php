<?php

namespace App\Http\Controllers\Ajax;

use App\User;

class UsersListController
{
    function __invoke()
    {
        $users = User::select('id', 'name')
            ->otherUsers()
            ->withNumberOfCardsSent()
            ->withNumberOfCardsReceived()
            ->get();

        return json_response($users);
    }
}
