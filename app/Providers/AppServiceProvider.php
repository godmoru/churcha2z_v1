<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Upload\FileUpload;

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
        $this->app->register(RepositoryServiceProvider::class);
        $this->app->singleton('upload.file',function () {
            return new FileUpload;
        });
    }
}
