<?php

if (!function_exists('json_response')) {
    function json_response($data, $status=200)
    {
        return response()
            ->json($data, $status);
    }
} 