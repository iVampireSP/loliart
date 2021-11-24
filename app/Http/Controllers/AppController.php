<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nwidart\Modules\Facades\Module;

class AppController extends Controller
{
    // 显示启用的module
    public function index()
    {
        return Module::all();
    }
}