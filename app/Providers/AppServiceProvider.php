<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        require_once(app_path() . '/Helpers.php');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // \DB::listen(function ($query) {
        //     $tmp = str_replace('?', '"' . '%s' . '"', $query->sql);
        //     $tmp = vsprintf($tmp, $query->bindings);
        //     $tmp = str_replace("\\", "", $tmp);
        //     \Log::info(' execution time: ' . $query->time . 'ms; ' . $tmp . "\n\n\t");
        // });

        if (PHP_OS_FAMILY === 'Windows') {
            throw new \App\Exceptions\PlatformNotSupported();
        }

        Paginator::defaultSimpleView('vendor.pagination.simple-default');
    }
}