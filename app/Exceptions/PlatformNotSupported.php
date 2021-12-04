<?php

namespace App\Exceptions;

use Exception;

class PlatformNotSupported extends Exception
{
    public function render()
    {
        return response('The software is not supported on this platform.');
    }
}
