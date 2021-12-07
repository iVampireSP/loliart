<?php

namespace Modules\Wings\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Wings\Entities\WingsNode;
use Modules\Wings\Jobs\RefreshWingNodeJob;

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
                    dispatch(new RefreshWingNodeJob($node->id));
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
}
