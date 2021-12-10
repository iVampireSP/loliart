<?php

namespace Modules\Wings\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Wings\Entities\WingsAllocation;
use Modules\Wings\Entities\WingsNode;
use Modules\Wings\Http\Controllers\JobController;
use Modules\Wings\Http\Controllers\PanelController;

class UpdateNodeInfoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $panel = new PanelController();
        WingsNode::whereNotNull('token')->chunk(100, function ($nodes) use ($panel) {
            foreach ($nodes as $node) {
                $data = $panel->nodeStatus($node->id);
                if (!$data) {
                    $node->active = 0;
                    $node->save();
                } else {
                    $node->version = $data->version;
                    $node->kernel_version = $data->kernel_version;
                    $node->architecture = $data->architecture;
                    $node->os = $data->os;
                    $node->cpu_count = $data->cpu_count;
                    $node->active = 1;
                    $node->save();
                }

                // 更新 Allocation
                $next_page = 1;
                $is_continue = true;
                $allocation_ids = [];
                do {
                    $allocations = (object)$panel->allocations($node->node_id, $next_page);
                    $total_page = $allocations->meta['pagination']['total_pages'];
                    if ($next_page == $total_page) {
                        $is_continue = false;
                    } else {
                        $next_page = $allocations->meta['pagination']['current_page'] + 1;
                    }
                    foreach ($allocations->data as $allocation) {
                        $allocation = (object)$allocation['attributes'];

                        $resp = [
                            'ip' => $allocation->ip,
                            'alias' => $allocation->alias,
                            'port' => $allocation->port,
                            'node_id' => $node->id,
                            'allocation_id' => $allocation->id,
                        ];

                        $orm = WingsAllocation::where('allocation_id', $allocation->id);

                        if ($orm->exists()) {
                            $allocation_ids[] = $allocation->id;
                            $resp['found'] = 1;
                            $orm->update($resp);
                        } else {
                            $allocation_ids[] = $allocation->id;
                            WingsAllocation::create($resp);
                        }


                        // if (!$allocation['attributes']['assigned']) {
                        //     $selected_id = $allocation['attributes']['id'];
                        //     return $selected_id;
                        // }
                    }
                } while ($is_continue);
                WingsAllocation::whereNotIn('allocation_id', $allocation_ids)->update(['found' => 0]);
            }
        });
    }
}
