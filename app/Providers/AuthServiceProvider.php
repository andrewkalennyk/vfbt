<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Models\GeneralInfoCitizen' => 'App\Policies\GeneralInfoPolicy',
         'App\Models\Promotion' => 'App\Policies\Policy',
         'App\Models\CitizensCategory' => 'App\Policies\Policy',
         'App\Models\CitizensStatus' => 'App\Policies\Policy',
         'App\Models\Revision' => 'App\Policies\RevisionPolicy',
         'App\Models\User' => 'App\Policies\Policy',
         'App\Models\UserRole' => 'App\Policies\Policy',
         'App\Models\Office' => 'App\Policies\OfficePolicy',
         'App\Models\ElectivePlot' => 'App\Policies\ElectivePlotPolicy',
         'App\Models\Street' => 'App\Policies\ElectivePlotPolicy',
         'App\Models\House' => 'App\Policies\ElectivePlotPolicy',
         'App\Models\Citizen' => 'App\Policies\OfficePolicy',
         'App\Models\NavigationMenuItem' => 'App\Policies\Policy',
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
