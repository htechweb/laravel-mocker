<?php

namespace Htech\MockEntry;
use Illuminate\Support\ServiceProvider;

class MockEntryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Htech\MockEntry\Controllers\MockEntryController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }
}
