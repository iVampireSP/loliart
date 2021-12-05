<?php

namespace Modules\Wings\Http\Controllers;

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

    public function get($url, $data = null)
    {
        return $this->http->get($this->url . $url, $data)->json();
    }

    public function post($url, $data = null)
    {
        return $this->http->post($this->url . $url, $data);
    }

    public function patch($url, $data = null)
    {
        return $this->http->patch($this->url . $url, $data);
    }

    public function delete($url, $data = null)
    {
        return $this->http->delete($this->url . $url, $data);
    }
}