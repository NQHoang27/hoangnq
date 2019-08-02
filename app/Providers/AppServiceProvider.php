<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\IUserRepository;
use App\Repositories\UserRepository;
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
        // $this->app->singleton(RepositoryInterface::class, EloquentRepository::class, App\Repositories\UserRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
        // $this->app->bind(IUserRepository::class, function () {
        //     return new UserRepository(new User());
        // });
    }
}
