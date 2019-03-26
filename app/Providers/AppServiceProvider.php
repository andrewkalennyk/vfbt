<?php

namespace App\Providers;

use App\Models\HouseCitizen;
use App\Observers\HouseCitizensObserver;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
       HouseCitizen::observe(HouseCitizensObserver::class);
    }
}
