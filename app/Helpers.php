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