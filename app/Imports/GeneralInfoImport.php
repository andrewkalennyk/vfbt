<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GeneralInfoImport implements  WithHeadingRow
{
    /**
    * @param Collection $collection
    */


    public function headingRow(): int
    {
        return 4;
    }
}
