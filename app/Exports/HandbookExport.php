<?php

namespace App\Exports;

use App\Models\House;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HandbookExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $info = House::with('street.elective_plot.office')->get();

        return $this->formCollection($info);
    }

    public function headings(): array
    {
        return [
            'id Будинку', 'Громадська приймальня', 'Дільниця', 'Вулиця' , 'Будинок'
        ];
    }

    public function formCollection($info) {
        $infoCollect = collect([]);
        foreach ($info as $house) {
            $array = collect([
                'id' => $house->id,
                'Громадська приймальня' => $house->street->elective_plot->office->title,
                'Дільниця' => $house->elective_plot->title,
                'Вулиця' => $house->street->title,
                'Будинок' => $house->title,
            ]);
            $infoCollect = $infoCollect->push($array);
        }
        return $infoCollect;

    }
}
