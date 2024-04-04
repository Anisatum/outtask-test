<?php

namespace App\Providers;

use App\Services\API\EmployeeConnector;
use App\Services\API\EmployeeConnectorMocki;
use App\Services\API\EmployeeConnectorRetool;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Nette\NotImplementedException;

class EmployeeConnectorProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(EmployeeConnector::class, function (Application $app) {
            switch (config('services.employeeApi'))
            {
                case 'retoolapi':
                    return new EmployeeConnectorRetool();
                case 'mocki':
                    return new EmployeeConnectorMocki();
                default:
                    throw new NotImplementedException("API driver not implemented", config('API_DRIVER'));
            }
        });
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
