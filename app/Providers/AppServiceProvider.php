<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Repositories\RepositoryInterface;
//use App\Http\Repositories\User\UserRepositoryInterface;
use App\Http\Repositories\EloquentRepository;
//use App\Http\Repositories\User\UserEloquentRepository;

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
        //
        $this->app->singleton(RepositoryInterface::class, EloquentRepository::class);
    }
}
