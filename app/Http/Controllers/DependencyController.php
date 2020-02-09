<?php

namespace App\Http\Controllers;

use App\Models\CitizensSubStatus;
use App\Models\House;
use App\Models\RegionalEstablishment;
use App\Models\Street;
use Illuminate\Support\Facades\DB;

class DependencyController extends Controller
{

    public function getHousesByStreet($streetId)
    {
        return House::byStreet($streetId)->orderBy('title','asc')->get()->map(function ($item) {
            return ['value' => $item->id, 'display' => $item->title];
        })->sortBy('display',SORT_NUMERIC);
    }

    public function getEntityByHouse($houseId, $entityField)
    {
        $house = House::find($houseId);
        $entities = [];
        
        if ($house->$entityField && !$house->is_private) {
            for ($i = 1; $i <= $house->$entityField; $i++) {
                $entities[] = [
                    'value' => $i,
                    'display' => $i
                ];
            }
        }
        return $entities;
    }

    public function getIsPrivateByHouse($houseId)
    {
        $house = House::find($houseId);

        return $house->type === House::PRIVATE_TYPE ? 1 : 0;
    }

    public function getStreetsByElectivePlot($electivePlotId)
    {
        $streetIds = DB::table('elective_plots_streets')->where('elective_plot_id', $electivePlotId)->pluck('street_id');
        return Street::whereIn('id', $streetIds)->get()->map(function ($item) {
            return ['value' => $item->id, 'display' => $item->title];
        });
    }

    public function getRegionalEstablishmentByType($typeId)
    {
        return RegionalEstablishment::where('regional_establishment_type_id', $typeId)->get()->map(function ($item) {
            return ['value' => $item->id, 'display' => $item->title];
        });
    }

    public function getCitizenSubStatusByStatus($statusId)
    {
        return CitizensSubStatus::where('citizens_status_id', $statusId)->get()->map(function ($item) {
            return ['value' => $item->id, 'display' => $item->title];
        });
    }
}
