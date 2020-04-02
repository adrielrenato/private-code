<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;

use Spatie\Activitylog\Models\Activity;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

use App\Models\User;
use App\Models\Group;
use App\Models\Customer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) { 
            if (auth()->user()->can('viewAny', new Customer())) {
                $event->menu->add([
                    'text' => 'customers',
                    'url'  => 'customers',
                    'icon' => 'fas fa-user-tie',
                ]);
            }

            $event->menu->add(['header' => 'account_settings']);
            
            if (auth()->user()->can('viewAny', new Group())) {
                $event->menu->add([
                    'text' => 'groups',
                    'url'  => 'groups',
                    'icon' => 'fas fa-users',
                ]);
            }

            if (auth()->user()->can('viewAny', new User())) {
                $event->menu->add([
                    'text' => 'users',
                    'url'  => 'users',
                    'icon' => 'fas fa-id-badge',
                ]);
            }

            if (auth()->user()->can('viewAny', new Activity())) {
                $event->menu->add([
                    'text'  => 'logs',
                    'url'   => 'logs',
                    'icon'  => 'fas fa-file-alt'
                ]);
            }

            if (auth()->user()->can('editPassword', new User())) {
                $event->menu->add([
                    'text' => 'edit_password',
                    'url'  => 'edit-password',
                    'icon' => 'fas fa-lock',
                ]);
            }
        });
    }
}
