<?php

namespace App\Http\Controllers;

use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\Cache;

class AppController extends Controller
{

    public static function index()
    {
        return response()->json(self::info());
    }

    public static function info()
    {
        return [
            'status' => 1,
            'data' => [
                'name' => config('app.name'),
                'url' => config('app.url'),
                'node' => config('app.node'),
                'version' => [self::getVersion(), self::commit()],
                'modules' => Module::all()
            ]
        ];
    }

    private static function getVersion()
    {
        if (app()->isLocal()) {
            return self::version();
        } else {
            return Cache::remember('git-version', 5, function () {
                return self::version();
            });
        }
    }

    private static function version()
    {
        if (file_exists(base_path('.git/HEAD'))) {
            $head = explode(' ', file_get_contents(base_path('.git/HEAD')));

            if (array_key_exists(1, $head)) {
                $path = base_path('.git/' . trim($head[1]));
            }
        }

        if (isset($path) && file_exists($path)) {
            return substr(file_get_contents($path), 0, 8);
        }

        return config('app.version');
    }

    private static function commit()
    {
        // show latest commit
        $disableds = explode(',', ini_get('disable_functions'));
        if (in_array('exec', $disableds)) {
            return null;
        } else {
            return exec('git log --oneline -1');
        }
    }
}
