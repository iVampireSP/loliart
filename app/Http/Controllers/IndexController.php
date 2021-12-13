<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Torann\GeoIP\Facades\GeoIP;

class IndexController extends Controller
{
    public function index() {
        $location = GeoIP::getLocation();
        $iso_code = $location->iso_code;
        $name = 'index.' . strtolower($iso_code);
        if (View::exists($name)) {
            return view($name);
        } else {
            return view('index.default');
        }

    }
}
