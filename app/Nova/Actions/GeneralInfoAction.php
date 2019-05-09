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
        $filters = $this->request->filters();
        return view('export.general_info', compact('citizens','filters'));
    }

    public function getInfo()
    {
        $ids = explode(',',$this->request->get('resources'));
        return GeneralInfoCitizen::with(['citizen.promotions','street','house','house_citizen.citizen_status'])->whereIn('id',$ids)->get();
    }

}
