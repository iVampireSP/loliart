<?php

namespace Spatie\ResponseCache\Commands;

use Illuminate\Console\Command;
use Spatie\ResponseCache\Events\ClearedResponseCache;
use Spatie\ResponseCache\Events\ClearingResponseCache;
use Spatie\ResponseCache\Facades\ResponseCache;

class ClearCommand extends Command
{
    protected $signature = 'responsecache:clear {--url=}';

    protected $description = 'Clear the response cache';

    public function handle()
    {
        event(new ClearingResponseCache());

        $this->clear();

        event(new ClearedResponseCache());

        $this->info('Response cache cleared!');
    }

    protected function clear()
    {
        if ($url = $this->option('url')) {
            return ResponseCache::forget($url);
        }

        ResponseCache::clear();
    }
}
