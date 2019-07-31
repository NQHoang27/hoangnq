<?php

namespace App\Providers;

use App\User;
use App\Model\Team;
use App\Model\Project;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\IUserRepository;
use App\Repositories\Contracts\IProjectRepository;
use App\Repositories\Contracts\ITeamRepository;
use App\Repositories\UserRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\TeamRepository;
use App\Http\Repositories\EloquentRepository;

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
        $this->app->bind(ITeamRepository::class, function () {
            return new TeamRepository(new Team());
        });       
        $this->app->bind(IUserRepository::class, function () {
            return new UserRepository(new User());
        });
        $this->app->bind(IProjectRepository::class, function () {
            return new ProjectRepository(new Project());
        });
    }
}
