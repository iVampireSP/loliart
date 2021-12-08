<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DumpUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dump language and permissions for update.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('iseed', ['tables' => 'language_translates', '--force' => true]);
        $this->call('iseed', ['tables' => 'language_black_lists', '--force' => true]);
        $this->call('iseed', ['tables' => 'permissions', '--force' => true]);

        return Command::SUCCESS;
    }
}