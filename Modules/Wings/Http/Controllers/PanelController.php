<?php

namespace Modules\Wings\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Client\RequestException;

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

    public function deleteLocation($id)
    {
        return $this->delete('/locations/' . $id);
    }

    // Nodes
    public function nodes($cache = true)
    {
        return $this->get('/nodes');
    }

    public function node($id, $cache = true)
    {
        $cache_key = 'wings_node_' . $id;
        // return Cache::get($cache_key);
        if ($cache) {
            return Cache::get($cache_key);
        } else {
            Cache::put($cache_key, $this->get('/nodes/' . $id), 600);
            return $this->get('/nodes/' . $id);
        }
    }

    public function get($url, $data = null)
    {
        try {
            $response = $this->http->get($this->url . $url, $data);
            $response->throw();

            if ($response->failed()) {
                return false;
            } else {
                return $response->json() ?? false;
            }
        } catch (Exception $e) {
            unset($e);
            return false;
        }
    }

    public function post($url, $data = null)
    {
        try {
            $response = $this->http->post($this->url . $url, $data);
            $response->throw();
            if ($response->failed()) {
                return false;
            } else {
                return $response->json();
            }
        } catch (RequestException $e) {
            unset($e);
            return false;
        }
    }

    public function patch($url, $data = null)
    {
        try {
            $response = $this->http->patch($this->url . $url, $data);
            $response->throw();
            if ($response->failed()) {
                return false;
            } else {
                return $response->json();
            }
        } catch (RequestException $e) {
            unset($e);
            return false;
        }
    }

    public function delete($url, $data = null)
    {
        try {
            $response = $this->http->delete($this->url . $url, $data);
            $response->throw();
            if ($response->failed()) {
                return false;
            } else {
                return true;
            }
        } catch (RequestException $e) {
            unset($e);
            return false;
        }
    }
}
