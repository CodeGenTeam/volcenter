<?php

namespace app\Providers;

use App\AdminPanel\AdminPanel;
use App\Http\ReturnUtil;
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
        $this->app->singleton(ReturnUtil::class, function () { return new ReturnUtil(); });
        $this->app->singleton('AdminPanel', function () {return new AdminPanel();});
    }
}
