<?php

namespace App\Providers;

use App\Interfaces\TodoServiceInterface;
use App\Services\TodoService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            TodoServiceInterface::class,
            TodoService::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
