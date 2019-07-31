<?php

namespace App\Providers;

use App\Facades;
use Illuminate\Support\ServiceProvider;

class FacadeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('string_helper', function () {
            return new DemoHelloWorldHelper();
        });
    }
}
