<?php

namespace App\Providers;

use App\Http\ReturnUtil;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton('ReturnUtil', function() { return new ReturnUtil(); });
    }
}
