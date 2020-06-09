<?php

namespace App\Http\Controllers\Ajax;

use App\User;

class UserListController
{
    function __invoke()
    {
        return json_response(User::otherUsers()->get());
    }
}
