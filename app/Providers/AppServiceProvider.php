<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\LocationRepository;
use App\Repositories\LocationRepositoryInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LocationRepositoryInterface::class, LocationRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
