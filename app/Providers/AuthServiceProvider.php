<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\Group;
use App\Models\PhoneByCustomer;
use App\Models\User;
use App\Policies\CustomerPolicy;
use App\Policies\GroupPolicy;
use App\Policies\ActivityPolicy;
use App\Policies\PhoneByCustomerPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Activitylog\Models\Activity;

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
        PhoneByCustomer::class => PhoneByCustomerPolicy::class,
        User::class => UserPolicy::class,
        Activity::class => ActivityPolicy::class
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
