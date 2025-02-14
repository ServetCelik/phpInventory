<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\DepartmentRepositoryInterface;
use App\Repositories\DepartmentRepository;
use App\Services\CreateDepartmentService;
use App\Services\Interfaces\CreateDepartmentServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
        $this->app->bind(CreateDepartmentServiceInterface::class, CreateDepartmentService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
