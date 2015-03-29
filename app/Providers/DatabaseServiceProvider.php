<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EventRepositoryInterface;
use App\Repositories\Eloquent\EventRepository;

use App\Repositories\CarpoolingRepositoryInterface;
use App\Repositories\Eloquent\CarpoolingRepository;

class DatabaseServiceProvider extends ServiceProvider
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
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
        $this->app->bind(CarpoolingRepositoryInterface::class, CarpoolingRepository::class);
    }

}
