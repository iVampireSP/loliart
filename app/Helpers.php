<?php

/**
 * Helpers
 */

use App\Http\Controllers\TranslateController;

if (!function_exists('tr')) {
    function tr($str)
    {
        return TranslateController::translate($str);
    }
}