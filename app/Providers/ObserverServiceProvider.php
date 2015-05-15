<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //User::observe(new UserObserver);
    }

}
