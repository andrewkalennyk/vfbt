<?php

namespace App\Exports;

use App\Models\Citizen;
use Maatwebsite\Excel\Concerns\FromCollection;

class CitizenExport implements FromCollection
{

    protected $filters = [];

    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Citizen::all();
    }
}
