<?php

namespace Modules\Wings\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Support\Renderable;

class PanelController extends Controller
{
    protected $url;
    protected $http;

    public function __construct()
    {
        $this->url = config('wings.url') . '/api/application';
        $this->http = Http::withToken(config('wings.key'));
    }


    // Users
    public function users()
    {
        return $this->get('/users');
    }

    // Locations
    public function locations()
    {
        return $this->get('/locations');
    }

    // createLocation

    public function createLocation($short, $name)
    {
        return $this->post('/locations', [
            'short' => $short,
            'long' => $name,
        ]);
    }

    public function get($url, $data = null)
    {
        try {
            return $this->http->get($this->url . $url, $data)->json();
        } catch (Exception $e) {
            unset($e);
            return null;
        }
    }

    public function post($url, $data = null)
    {
        try {
            return $this->http->post($this->url . $url, $data);
        } catch (Exception $e) {
            unset($e);
            return null;
        }
    }

    public function patch($url, $data = null)
    {
        try {
            return $this->http->patch($this->url . $url, $data);
        } catch (Exception $e) {
            unset($e);
            return null;
        }
    }

    public function delete($url, $data = null)
    {
        try {
            return $this->http->delete($this->url . $url, $data);
        } catch (Exception $e) {
            unset($e);
            return null;
        }
    }
}