<?php

namespace App\Providers;

use App\Nova\GeneralInfoCitizens;
use App\Nova\Citizen;
use App\Nova\CitizensCategory;
use App\Nova\CitizensStatus;
use App\Nova\ElectivePlot;
use App\Nova\House;
use App\Nova\HousesCitizen;
use App\Nova\Metrics\CitizenCount;
use App\Nova\Office;
use App\Nova\Promotion;
use App\Nova\Revision;
use App\Nova\Street;
use App\Nova\User;
use Joedixon\NovaTranslation\NovaTranslation;
use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        /*Nova::serving(function () {
            HouseCitizen::observe(HouseCitizensObserver::class);
        });*/
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            new CitizenCount(),
        ];
    }


    public function resources()
    {
        Nova::resources([
            CitizensCategory::class,
            CitizensStatus::class,
            Citizen::class,
            Office::class,
            ElectivePlot::class,
            Street::class,
            House::class,
            HousesCitizen::class,
            GeneralInfoCitizens::class,
            Promotion::class,
            Revision::class,
            User::class,
            //Translations::class,
        ]);
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            //new NovaTranslation,
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
