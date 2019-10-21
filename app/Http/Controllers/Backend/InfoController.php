<?php
namespace App\Http\Controllers\Backend;

use App\Models\CitizensCategory;
use App\Models\CitizensStatus;
use App\Models\CitizensSubStatus;
use App\Models\ElectivePlot;
use App\Models\House;
use App\Models\RegionalEstablishment;
use App\Models\RegionalEstablishmentType;
use App\Models\Street;
use Illuminate\Http\Request;

class InfoController extends \App\Http\Controllers\Controller
{
    public function getInfo(Request $request)
    {
        $categories = CitizensCategory::all();
        $electivePlot = ElectivePlot::all();
        $streets = Street::all();
        $houses = House::all();
        $statuses = CitizensStatus::all();
        $regionalEstablishmentTypes = RegionalEstablishmentType::all();
        $regionalEstablishments = RegionalEstablishment::all();
        $citizenSubStatuses = CitizensSubStatus::all();

        return [
            'categories' => $categories,
            'elective_plots' => $electivePlot,
            'streets' => $streets,
            'houses' => $houses,
            'statuses' => $statuses,
            'regional_establishment_types' => $regionalEstablishmentTypes,
            'regional_establishments' => $regionalEstablishments,
            'citizen_sub_statuses' => $citizenSubStatuses
        ];

    }

}