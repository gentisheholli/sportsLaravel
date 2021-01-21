<?php

namespace App\Providers;

use App\Repositories\MenuRepository;
use App\Repositories\MenuItemRepository;
use App\Repositories\LeagueRepository;
use App\Repositories\TeamRepository;



use App\Repositories\Interfaces\MenuRepositoryInterface;
use App\Repositories\Interfaces\MenuItemRepositoryInterface;
use App\Repositories\Interfaces\LeagueRepositoryInterface;
use App\Repositories\Interfaces\TeamRepositoryInterface;


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            MenuRepositoryInterface::class,
            MenuRepository::class,
            
        );

        $this->app->bind(
            MenuItemRepositoryInterface::class,
            MenuItemRepository::class,
        );

        $this->app->bind(
            LeagueRepositoryInterface::class,
            LeagueRepository::class,
        );

        $this->app->bind(
            TeamRepositoryInterface::class,
            TeamRepository::class,
        );

    }
    

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}