<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //     $router->get('/user', ['middleware' => 'auth', function () {
    //     return auth()->user();
    // }]);

    // $router->group(['prefix' => 'oauth'], function () use ($router) {
    //     $router->get('redirect', 'AuthController@redirect');
    //     $router->get('callback', 'AuthController@callback');
    // });
    public function redirect(Request $request)
    {
        $request->session()->put('state', $state = Str::random(40));

        $query = http_build_query([
            'client_id' => config('oauth.client_id'),
            'redirect_uri' => config('oauth.callback_uri'),
            'response_type' => 'code',
            'scope' => '',
            'state' => $state,
        ]);

        return redirect()->to(config('oauth.oauth_auth_url') . '?' . $query);
    }

    public function callback(Request $request)
    {
        $state = $request->session()->pull('state');

        throw_unless(
            strlen($state) > 0 && $state === $request->state,
            InvalidArgumentException::class
        );

        $http = new \GuzzleHttp\Client;

        $authorize = $http->post(config('oauth.oauth_token_url'), [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => config('oauth.client_id'),
                'client_secret' => config('oauth.client_secret'),
                'redirect_uri' => config('oauth.callback_uri'),
                'code' => $request->code,
            ],
        ])->getBody();
        $authorize = json_decode($authorize);

        $oauth_user = $http->get(config('oauth.oauth_user_url'), [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $authorize->access_token,
            ],
        ])->getBody();
        $oauth_user = json_decode($oauth_user);

        $user_sql = User::where('email', $oauth_user->email);
        $user = $user_sql->first();

        $api_token = null;
        if (is_null($user)) {
            $name = $oauth_user->name;
            $email = $oauth_user->email;
            $password = Str::random(8);
            $email_verified_at = $oauth_user->email_verified_at;
            $api_token = Str::random(50);
            $user = User::create(compact('name', 'email', 'password', 'email_verified_at', 'api_token'));
        } else {
            if ($user->name != $oauth_user->name) {
                User::where('email', $oauth_user->email)->update([
                    'name' => $oauth_user->name
                ]);
            }
            $api_token = $user->api_token;
        }

        // 更新最后登录时间
        $user_sql->update([
            'last_login_at' => Carbon::now()
        ]);

        Auth::loginUsingId($user->id, true);

        return redirect()->route('www.index');
    }
}