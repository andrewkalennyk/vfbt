<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Street;

class DependecyController extends Controller
{

    public function getHousesByStreet($streetId)
    {
        return House::byStreet($streetId)->get()->map(function($item) {
            return [ 'value' => $item->id, 'display' => $item->title ];
        });
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

        return $house->is_private ?? false;
    }

    public function getStreetsByElectivePlot($electivePlotId)
    {
        return Street::byElectivePlot($electivePlotId)->get()->map(function($item) {
            return [ 'value' => $item->id, 'display' => $item->title ];
        });
    }
}
