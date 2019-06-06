<?php

namespace App\Observers;

use App\Models\GeneralInfoCitizen;
use App\Models\House;
use App\Models\HouseCitizen;
use Illuminate\Support\Facades\Log;

class HouseCitizensObserver
{
    public function created(HouseCitizen $houseCitizens)
    {
        GeneralInfoCitizen::create($this->getInfo($houseCitizens));
    }

    public function saved(HouseCitizen $houseCitizens)
    {
        GeneralInfoCitizen::updateOrCreate([
            'house_citizen_id' => $houseCitizens->id,
        ],
            $this->getInfo($houseCitizens));
    }

    protected function getInfo(HouseCitizen $houseCitizens) :array
    {
        $house = House::with(['street','elective_plot.office'])->where('id', $houseCitizens->house_id)->first();

        return [
            'office_id' => !empty($house->elective_plot_id) ? $house->elective_plot->office->id : null,
            'elective_plot_id' => !empty($house->elective_plot_id) ? $house->elective_plot_id : null,
            'street_id' => $house->street->id,
            'house_id' => $houseCitizens->house_id,
            'citizen_id' => $houseCitizens->citizen_id,
            'flat_number' => $houseCitizens->flat_number,
            'house_citizen_id' => $houseCitizens->id,
        ];
    }
}
