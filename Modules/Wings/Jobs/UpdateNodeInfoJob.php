<?php

namespace Modules\Wings\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Wings\Entities\WingsNode;
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
            }
        });
    }
}