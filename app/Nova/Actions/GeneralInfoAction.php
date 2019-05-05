<?php

namespace App\Nova\Actions;

use App\Models\GeneralInfoCitizen;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GeneralInfoAction extends ExportFromView implements FromView
{

    public $name = 'Експорт';

    public function view(): View
    {
        $citizens = $this->getInfo();
        return view('export.general_info', compact('citizens'));
    }

    public function getInfo()
    {
        $ids = explode(',',$this->request->get('resources'));
        return GeneralInfoCitizen::with(['citizen','street','house'])->whereIn('id',$ids)->get();
    }

}
