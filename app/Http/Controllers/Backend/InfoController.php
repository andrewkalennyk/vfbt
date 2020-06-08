<?php
namespace App\Http\Controllers\Backend;

use App\Models\CitizensCategory;
use App\Models\CitizensStatus;
use App\Models\CitizensSubStatus;
use App\Models\ElectivePlot;
use App\Models\House;
use App\Models\Promotion;
use App\Models\RegionalEstablishment;
use App\Models\RegionalEstablishmentType;
use App\Models\Street;
use Illuminate\Http\Request;

class InfoController extends \App\Http\Controllers\Controller
{
    public function getInfo(Request $request)
    {
        $categories = CitizensCategory::orderByTitleAsc()->get();
        $electivePlot = ElectivePlot::orderByTitleAsc()->get();
        $streets = Street::orderByTitleAsc()->get();
        $houses = House::orderByTitleAsc()->get();
        $statuses = CitizensStatus::orderByTitleAsc()->get();
        $regionalEstablishmentTypes = RegionalEstablishmentType::orderByTitleAsc()->get();
        $regionalEstablishments = RegionalEstablishment::orderByTitleAsc()->get();
        $citizenSubStatuses = CitizensSubStatus::orderByTitleAsc()->get();

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

    public function getUserRole()
    {
        $user = \request()->user();

        if ($user->isSuperAdmin()){
            return [
                'role' => 'admin'
            ];
        } elseif ($user->isCoordinator()) {
            return [
                'role' => 'coordinator'
            ];
        } else {
            return [
                'role' => 'worker'
            ];
        }
    }

    public function getPromotions(Request $request)
    {
        return [
            'promotions' => Promotion::all()
        ];
    }

}