<?php

namespace app\Providers;

use app\AdminPanel\AdminPanel;
use App\Http\ReturnUtil;
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
        //
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
