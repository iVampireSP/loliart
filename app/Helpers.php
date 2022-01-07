<?php

/**
 * Helpers
 */

use App\Events\TeamEvent;
use App\Events\UserEvent;
use App\Http\Controllers\AppController;
use App\Http\Controllers\TranslateController;
use App\Models\TeamUser;

if (!function_exists('tr')) {
    function tr($str)
    {
        $translate = new TranslateController();
        return $translate->translate($str);
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

if (!function_exists('userInTeam')) {
    function userInTeam($team_id)
    {
        return TeamUser::where('team_id', $team_id)->where('user_id', auth()->id())->exists();
    }
}

if (!function_exists('userInTeamFail')) {
    function userInTeamFail($team_id)
    {
        if (!TeamUser::where('team_id', $team_id)->where('user_id', auth()->id())->exists()) {
            return fail(404);
        }
    }
}

if (!function_exists('can')) {
    function can($permission)
    {
        if (auth()->user()->can('admin')) {
            return true;
        }

        if (!auth()->user()->can($permission)) {
            return false;
        }

        return true;
    }
}

if (!function_exists('canFail')) {
    function canFail($permission)
    {
        if (auth()->user()->can('admin')) {
            return true;
        }
        if (!auth()->user()->can($permission)) {
            abort(403);
        }
    }
}

if (!function_exists('write')) {
    function write($msg, $user_id = 0)
    {
        if (!$user_id) {
            $user_id = auth()->id();
        }

        broadcast(new UserEvent($user_id, [
            'type' => 'message',
            'data' => $msg,
        ]));

    }
}

if (!function_exists('writeTeam')) {
    function writeTeam($msg, $team_id = 0)
    {
        if (!$team_id) {
            $team_id = session('team_id') ?? 0;
        }

        broadcast(new TeamEvent($team_id, [
            'type' => 'message',
            'data' => $msg,
        ]));

    }
}

if (!function_exists('userEvent')) {
    function userEvent($event, $data = null, $user_id = 0)
    {
        if (!$user_id) {
            $user_id = auth()->id();
        }

        broadcast(new UserEvent($user_id, [
            'type' => $event,
            'data' => $data,
        ]));

    }
}

if (!function_exists('teamEvent')) {
    function teamEvent($event, $data = null, $team_id = 0)
    {
        if (!$team_id) {
            $team_id = session('team_id') ?? 0;
        }

        broadcast(new TeamEvent($team_id, [
            'type' => $event,
            'data' => $data,
        ]));
    }
}

if (!function_exists('success')) {
    function success($data = null)
    {
        return response()->json(['status' => 1, 'data' => $data], 200);
    }
}

if (!function_exists('fail')) {
    function fail($data = null)
    {
        return response()->json(['status' => 0, 'data' => $data], 400);
    }
}

if (!function_exists('unitConversion')) {
    function unitConversion($num)
    {
        $p = 0;
        $format = 'Bytes';
        if ($num > 0 && $num < 1024) {
            $p = 0;
            return number_format($num) . ' ' . $format;
        }
        if ($num >= 1024 && $num < pow(1024, 2)) {
            $p = 1;
            $format = 'KB';
        }
        if ($num >= pow(1024, 2) && $num < pow(1024, 3)) {
            $p = 2;
            $format = 'MB';
        }
        if ($num >= pow(1024, 3) && $num < pow(1024, 4)) {
            $p = 3;
            $format = 'GB';
        }
        if ($num >= pow(1024, 4) && $num < pow(1024, 5)) {
            $p = 3;
            $format = 'TB';
        }
        $num /= pow(1024, $p);
        return number_format($num, 3) . ' ' . $format;
    }
}

function ipPort($ip, $port) {
    return $ip . ':' . $port;
}
