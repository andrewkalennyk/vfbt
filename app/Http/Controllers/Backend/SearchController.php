<?php
namespace App\Http\Controllers\Backend;

use App\Imports\GeneralInfoImport;
use App\Imports\GeneralInfoImportModel;
use App\Models\Citizen;
use App\Models\ElectivePlot;
use App\Models\GeneralInfoCitizen;
use App\Models\Street;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SearchController extends \App\Http\Controllers\Controller
{
    public function doSearch(Request $request)
    {
        $citizens  = Citizen::with(['categories', 'house_citizens', 'general_info'])
            ->search($request->except(['_token']))
            ->get();

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
            //$citizen->category = $citizen->getCategoryTitle();
            $citizen->birthDay = $citizen->getBirthDate();
            $citizen->black_list = $citizen->isInBlackList();
            $citizen->office = $citizen->getOfficeTitle();
            $citizen->elective_plot = $citizen->getElectivePlotTitle();
            $citizen->street = $citizen->getStreetTitle();
            $citizen->house = $citizen->getHouseTitle();
            $citizen->flat = $citizen->getFlatTitle();
            $citizen->type_list = $citizen->getListTitle();
            $citizen->list_reason = $citizen->getListReason();
            $citizen->statuses = explode(',<br>', $citizen->index_status);
            $citizen->search_categories = explode(',<br>', $citizen->index_category);
        }
        return $citizens;
    }

    public function getEntititesByStreet(Request $request)
    {
        $street = Street::with(['electivePlots','houses'])->find($request->get('street_id'));

        return [
            'elective_plots' => !empty($street) ? $street->electivePlots : ElectivePlot::all(),
            'houses' => !empty($street) ? $street->houses : '',
        ];
    }

    public function getEntititesByElectivePlot(Request $request)
    {
        $electivePlot = ElectivePlot::with(['streets'])->find($request->get('elective_plot_id'));

        return [
            'streets' => !empty($electivePlot) ? $electivePlot->streets : Street::all(),
        ];
    }
}