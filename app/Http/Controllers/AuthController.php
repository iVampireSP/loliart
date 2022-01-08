<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        if (strlen($state) > 0 && $state === $request->state) {
            // Go on
        } else {
            return redirect()->route('home')->with('message', 'Please try again.');
        }

        $http = new Client;

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
        $set_password = 0;
        if (is_null($user)) {
            $name = $oauth_user->name;
            $email = $oauth_user->email;
            $password = Str::random(8);
            $email_verified_at = $oauth_user->email_verified_at;
            $api_token = Str::random(50);
            $user = User::create(compact('name', 'email', 'password', 'email_verified_at', 'api_token'));
            $set_password = 1;
            $request->session()->put('auth.password_confirmed_at', time());
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

        if ($set_password) {
            return redirect()->route('password.reset');
        } else {
            return redirect()->route('main.index');
        }
    }

    public function reset()
    {
        return view('password.reset');
    }

    public function setup_password(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        User::find(auth()->id())->update(['password' => Hash::make($request->password)]);

        return redirect()->route('main.index');
    }

    public function confirm()
    {
        return view('password.confirm');
    }

    public function confirm_password(Request $request)
    {
        $request->validate($this->password_rules());

        $request->session()->put('auth.password_confirmed_at', time());

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }

    protected function password_rules()
    {
        return [
            'password' => 'required|password',
        ];
    }

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('main.index')->with('message', 'Your account has been logged out.');
    }
}
