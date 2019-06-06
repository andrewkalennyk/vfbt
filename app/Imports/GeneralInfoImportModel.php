<?php

namespace App\Imports;

use App\Models\Citizen;
use App\Models\CitizensStatus;
use App\Models\House;
use App\Models\HouseCitizen;
use App\Models\Street;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class GeneralInfoImportModel implements  ToCollection, WithMappedCells
{
    /**
    * @param Collection $collection
    */

    public $street;
    public $house;
    public $citizens;
    public $statuses;

    public function mapping(): array
    {
        return [
            'dvk'  => 'N2',
            'street' => 'A2',
        ];
    }

    public function __construct($citizens)
    {
        $this->citizens = $citizens;
        $this->statuses = CitizensStatus::all();
    }

    public function collection(Collection $collection)
    {
        $collection = $collection->toArray();
        $streetInfo = explode(',', $collection['street']);

        $this->street = Street::firstOrCreate(['title' => $streetInfo[0]]);
        $this->house = House::firstOrCreate(
            [
                'street_id' => $this->street->id,
                'elective_plot_id' => $this->street->elective_plot->id,
                'title'=> $streetInfo[1]
            ]
        );
        $this->saveCitizens();
    }

    public function saveCitizens()
    {
        $citizens = $this->citizens->first();
        if ($citizens->count()) {
            foreach ($citizens as $item) {
                if (!empty($item['prizvishche']) && !empty($item['imya']) && !empty($item['po_batkovi']) && !empty($item['telefon'])) {
                    $citizen = Citizen::importCitizen($item);

                    HouseCitizen::firstOrCreate(
                        [
                            'house_id' => $this->house->id,
                            'citizen_id' => $citizen->id,
                            'flat_number' => $item['kvartira'],
                            'citizen_status_id' => $this->detectStatus($item['status'])
                        ]
                    );
                }
            }
        }
    }

    public function detectStatus($field)
    {

        $status = $this->statuses->where('title', $field)->first();

        return  !empty($status) ? $status->id : NULL ;
    }
}
