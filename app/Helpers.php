<?php

/**
 * Helpers
 */

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
            abort(403);
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

if (!function_exists('success')) {
    function success($data = null)
    {
        return response()->json(['status' => 1, 'data' => $data]);
    }
}

if (!function_exists('fail')) {
    function fail($data = null)
    {
        return response()->json(['status' => 0, 'data' => $data]);
    }
}
