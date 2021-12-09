<?php

namespace Modules\Wings\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Wings\Entities\WingsNest;
use Modules\Wings\Entities\WingsNode;
use Modules\Wings\Jobs\RefreshWingNodeJob;
use Illuminate\Contracts\Support\Renderable;

class JobController extends Controller
{
    // Refresh wings data
    public static function refresh_wings($id = null)
    {
        if (is_null($id)) {
            // refresh all
            $nodes = WingsNode::all();
            WingsNode::chunk(100, function () use ($nodes) {
                foreach ($nodes as $node) {
                    dispatch(new RefreshWingNodeJob($node->node_id));
                }
            });
        } else {
            if (WingsNode::where('id', $id)->exists()) {
                dispatch(new RefreshWingNodeJob($id));
                return true;
            } else {
                return false;
            }
        }
    }

    // Refresh Nests and Eggs
    public static function refresh_nests()
    {
        $panel = new PanelController();
        $nests = (object)$panel->nests();
        if (!$nests) {
            return 0;
        }
        $arr = self::search($nests);

        $ids = [];
        foreach ($arr as $a) {
            $wingsNest = new WingsNest();
            $attr = $a['attributes'];
            $create_data = [
                'nest_id' => $attr['id'],
                'author' => $attr['author'],
                'name' => $attr['name'],
                'description' => $attr['description'],
            ];
            $wingsNest_where = $wingsNest->where('nest_id', $attr['id']);
            if ($wingsNest_where->exists()) {
                $ids[] = $attr['id'];
                $wingsNest_where->update($create_data);
            } else {
                $wingsNest->create($create_data);
            }
        }

        WingsNest::whereNotIn('nest_id', $ids)->update(['found' => 0]);

        return $arr;
    }

    public static function refresh_eggs($nest_id)
    {
        $panel = new PanelController();
        $eggs = (object)$panel->eggs($nest_id);
        return $eggs;
    }

    protected static function search(object $data)
    {
        $next_page = 1;
        $is_continue = true;
        $arr = [];
        do {
            $total_page = $data->meta['pagination']['total_pages'];
            if ($next_page == $total_page) {
                $is_continue = false;
            } else {
                $next_page = $data->meta['pagination']['current_page'] + 1;
            }

            foreach ($data->data as $d) {
                array_push($arr, $d);
            }
        } while ($is_continue);

        return $arr;
    }
}