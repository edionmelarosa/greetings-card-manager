<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('json_response')) {
    function json_response($data, $status = 200)
    {
        return response()
            ->json($data, $status);
    }
}

if (!function_exists('process_base_64_file')) {
    function process_base_64_file($base64File)
    {
        try {
            // .jpg .png .pdf
            $extension = explode('/', explode(':', substr($base64File, 0, strpos($base64File, ';')))[1])[1];

            $replace = substr($base64File, 0, strpos($base64File, ',') + 1);
            $file = str_replace($replace, '', $base64File);
            $file = str_replace(' ', '+', $file);

            $fileName = uniqid() . '.' . $extension;

            return [
                'file'      => $file,
                'fileName'  => $fileName,
                'extension' => $extension
            ];
        } catch (\Throwable $th) {
            return false;
        }
    }
}
