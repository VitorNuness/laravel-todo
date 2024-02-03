<?php

namespace App\Providers;

use App\Interfaces\CategoryServiceInterface;
use App\Interfaces\TodoServiceInterface;
use App\Services\CategoryService;
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
        $this->app->bind(
            CategoryServiceInterface::class,
            CategoryService::class
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
