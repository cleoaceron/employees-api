<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Employees\EmployeesInterface;
use App\Services\Employees\EmployeesService;

class EmployeesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EmployeesInterface::class, EmployeesService::class);
    }
}