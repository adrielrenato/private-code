<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\Group;
use App\Models\PhoneByCustomer;
use App\Policies\CustomerPolicy;
use App\Policies\GroupPolicy;
use App\Policies\PhoneByCustomerPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Group::class => GroupPolicy::class,
        Customer::class => CustomerPolicy::class,
        PhoneByCustomer::class => PhoneByCustomerPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
