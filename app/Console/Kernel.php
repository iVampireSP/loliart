<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Modules\Wings\Http\Controllers\JobController;
use Modules\Wings\Jobs\RefreshNestJob;
use Modules\Wings\Jobs\UpdateNodeInfoJob;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {
            JobController::refresh_wings();
            dispatch(new RefreshNestJob());
            dispatch(new UpdateNodeInfoJob());
        })->hourly()->name('Wings');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
