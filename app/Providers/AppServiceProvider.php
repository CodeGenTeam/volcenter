<?php

namespace App\Providers;

use App\Http\Facades\Admin;
use App\Http\Facades\Result;
use Illuminate\Support\ServiceProvider;
use DB;
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
        $this->app->singleton(Result::class, function () { return new Result(); });
        $this->app->singleton(Admin::class, function () {return new Admin();});
    }
}
