<?php

namespace App\Imports;

use App\Models\Citizen;
use App\Models\CitizensCategory;
use App\Models\House;
use App\Models\HouseCitizen;
use App\Models\Street;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GeneralInfoImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    public $citizenCategory = [];
    public $street;
    public $house;


    public function collection(Collection $collection)
    {
        dr($collection);
        if ($collection->count()) {
            foreach ($collection as $item) {
                if (!empty($item['prizvishche']) && !empty($item['imya']) && !empty($item['po_batkovi']) && !empty($item['telefon'])) {
                    $citizen = Citizen::importCitizen($item);
                    dr($item);
                    HouseCitizen::firstOrCreate(
                        [
                            'house_id' => $this->house->id,
                            'citizen_id' => $citizen->id,
                            'flat' => $item['']
                        ]
                    );
                }
            }
        }
    }

    public function headingRow(): int
    {
        return 4;
    }
}
