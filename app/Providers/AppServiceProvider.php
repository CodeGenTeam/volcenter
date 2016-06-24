<?php

namespace App\Providers;

use App\Http\ReturnUtil;
use App\Http\AdminPanel;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //DB::listen(function($query) {dump($query->sql);});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ReturnUtil::class, function () { return new ReturnUtil(); });
        $this->app->singleton(AdminPanel::class, function () {return new AdminPanel();});
    }
}
