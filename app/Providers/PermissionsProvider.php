<?php

namespace App\Providers;

use App\Permissions\Permissions;
use Illuminate\Support\ServiceProvider;

class PermissionsProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Permissions::class, function ($app) {
            return new Permissions();
        });
    }
}
