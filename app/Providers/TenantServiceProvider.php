<?php

namespace App\Providers;

use App\Core\Multitenancy\Tenant;
use Illuminate\Support\ServiceProvider;

class TenantServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('tenant', function () {
            return new Tenant();
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
