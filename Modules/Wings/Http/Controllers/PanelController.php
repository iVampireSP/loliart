<?php

namespace Modules\Wings\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Client\RequestException;
use Modules\Wings\Entities\WingsNode;

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
        if ($cache) {
            if (Cache::has($cache_key)) {
                return Cache::get($cache_key);
            } else {
                return $this->get('/nodes/' . $id);
            }
        } else {
            Cache::put($cache_key, $this->get('/nodes/' . $id), 600);
            return Cache::get($cache_key);;
        }
    }

    public function nodeStatus($id)
    {
        $node = WingsNode::find($id);
        $get_url = 'https://' . $node->fqdn . ':' . $node->daemon_listen . '/api/system';
        return (object)Http::withToken($node->token)->get($get_url)->json() ?? false;
    }

    public function createNode($data)
    {
        return $this->post('/nodes', $data);
    }

    public function deleteNode($id)
    {
        return $this->delete('/nodes/' . $id);
    }

    public function updateNode($id, $data)
    {
        return $this->patch('/nodes/' . $id, $data);
    }

    public function nodeConfig($id)
    {
        return $this->get('/nodes/' . $id . '/configuration');
    }

    // user
    public function user($id, $cache = true)
    {
        $cache_key = 'wings_user_' . $id;
        if ($cache) {
            if (Cache::has($cache_key)) {
                return Cache::get($cache_key);
            } else {
                Cache::put($cache_key, $this->get('/users/' . $id), 600);
            }
        }
        return Cache::get($cache_key);
    }

    public function createUser($data)
    {
        return $this->post('/users', $data);
    }

    public function deleteUser($id)
    {
        return $this->delete('/users/' . $id);
    }

    public function updateUser($id, $data)
    {
        return $this->patch('/users/' . $id, $data);
    }

    // Nests
    public function nests($page = 0)
    {
        return $this->get('/nests' . '?page=' . $page);
    }

    public function nest($id)
    {
        return $this->get('/nests/' . $id);
    }

    public function eggs($id)
    {
        return $this->get('/nests/' . $id . '/eggs?include=variables');
    }

    public function egg($nest_id, $egg_id)
    {
        return $this->get('/nests/' . $nest_id . '/eggs/' . $egg_id);
    }

    public function eggVar($nest_id, $egg_id)
    {
        return $this->get('/nests/' . $nest_id . '/eggs/' . $egg_id . '?include=variables');
    }

    // Allocation
    public function allocations($node_id, $page = 1)
    {
        return $this->get('/nodes/' . $node_id . '/allocations?include=server&page=' . $page);
    }

    public function createAllocation($node_id, $data)
    {
        return $this->post('/nodes/' . $node_id . '/allocations', $data);
    }

    public function deleteAllocation($node_id, $allocation_id)
    {
        return $this->delete('/nodes/' . $node_id . '/allocations/' . $allocation_id);
    }

    // Server
    // public function servers()
    // {
    // }

    // public function server($id)
    // {
    // }

    public function createServer($data)
    {
        return $this->post('/servers', $data);
    }

    public function deleteServer($id)
    {
        return $this->delete('/servers', $id);
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
        } catch (ConnectException $e) {
            unset($e);
            return false;
        } catch (RequestException $e) {
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
        } catch (ConnectException $e) {
            unset($e);
            return false;
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
        } catch (ConnectException $e) {
            unset($e);
            return false;
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
        } catch (ConnectException $e) {
            unset($e);
            return false;
        } catch (RequestException $e) {
            unset($e);
            return false;
        }
    }
}
