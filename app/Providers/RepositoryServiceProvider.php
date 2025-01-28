<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Disbursement;
use App\Observers\FileObserver;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Disbursement::observe(new FileObserver());
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            "App\Repositories\EloquentInterface\AuthInterface",
            "App\Repositories\Eloquent\AuthRepository"
        );
        $this->app->bind(
            "App\Repositories\EloquentInterface\UserInterface",
            "App\Repositories\Eloquent\UserRepository"
        );
        $this->app->bind(
            "App\Repositories\EloquentInterface\DisbursementInterface",
            "App\Repositories\Eloquent\DisbursementRepository"
        );
        $this->app->bind(
            "App\Repositories\EloquentInterface\ExpenditureInterface",
            "App\Repositories\Eloquent\ExpenditureRepository"
        );
    }
}
