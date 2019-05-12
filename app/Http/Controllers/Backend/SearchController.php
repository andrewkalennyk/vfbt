<?php
namespace App\Http\Controllers\Backend;

use App\Imports\GeneralInfoImport;
use App\Imports\GeneralInfoImportModel;
use App\Models\Citizen;
use App\Models\GeneralInfoCitizen;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SearchController extends \App\Http\Controllers\Controller
{
    public function doSearch(Request $request)
    {
        $citizens  = Citizen::with(['citizens_category', 'house_citizens', 'general_info'])->searchByName($request->all())->get();

        $citizens = $this->prepare($citizens);

        return [
            'message' => 'Знайдено',
            'citizens' => $citizens
        ];

    }

    public function prepare($citizens)
    {
        if ($citizens->count() == 0) {
            return $citizens;
        }

        foreach ($citizens as $citizen) {
            //dr($citizen);
            $citizen->category = $citizen->getCategoryTitle();
            $citizen->birthDay = $citizen->getBirthDate();
            $citizen->black_list = $citizen->isInBlackList();
            $citizen->office = $citizen->getOfficeTitle();
            $citizen->elective_plot = $citizen->getElectivePlotTitle();
            $citizen->street = $citizen->getStreetTitle();
            $citizen->house = $citizen->getHouseTitle();
            $citizen->flat = $citizen->getFlatTitle();

        }

        return $citizens;
    }
}