<?php

use Illuminate\Database\Seeder;
use App\Models\NavigationMenuItem;

class NavigationMenuItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resources = [
            'App\Nova\CitizensCategory',
            'App\Nova\CitizensStatus',
            'App\Nova\Citizen',
            'App\Nova\Office',
            'App\Nova\ElectivePlot',
            'App\Nova\Street',
            'App\Nova\House',
            'App\Nova\HousesCitizen',
            'App\Nova\GeneralInfoCitizens',
            'App\Nova\Promotion',
            'App\Nova\Revision',
            'App\Nova\User',
            'App\Nova\UserRole',
            'App\Nova\NavigationMenuItem',
        ];

        foreach ($resources as $resource) {
            NavigationMenuItem::updateOrCreate([
                'resource' => $resource,
            ],[
                'title' => $resource::label(),
            ]);
        }
    }
}
