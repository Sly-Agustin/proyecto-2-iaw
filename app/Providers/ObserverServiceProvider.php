<?php

namespace App\Providers;

use App\User;
use App\Jefe;
use App\Observers\UserObserver;
use App\Observers\JefeObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Jefe::observe(JefeObserver::class);
    }
}
