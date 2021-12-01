<?php

/**
 * Helpers
 */

use App\Http\Controllers\AppController;
use App\Http\Controllers\TranslateController;

if (!function_exists('tr')) {
    function tr($str)
    {
        return TranslateController::translate($str);
    }
}

if (!function_exists('app_info')) {
    function app_info()
    {
        return json_encode(AppController::info());
    }
}

if (!function_exists('avatar')) {
    function avatar($email)
    {
        $address = strtolower(trim($email));
        $hash = md5($address);
        return config('avatar.gravatar') . '/' . $hash;
    }
}