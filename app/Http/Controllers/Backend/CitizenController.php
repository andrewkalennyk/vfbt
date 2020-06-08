<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests\ApplyFormCitizenRequest;
use App\Models\ApplyForms\ApplyFormCitizen;
use App\Models\Citizen;
use Illuminate\Http\Request;

class CitizenController extends \App\Http\Controllers\Controller
{
    public function saveCitizen(ApplyFormCitizenRequest $request)
    {
        $applyForm = new ApplyFormCitizen();
        $applyForm->setInputData($request->all());
        $result = $applyForm->apply();

        return [
            'citizen' => $result,
            'message' => 'Збережено'
        ];

    }

    public function attachPromotionCitizen(Request $request)
    {
        $promotionId = $request->input('promotion_id');

        $citizen = Citizen::with('promotions')->where('id', $request->input('citizen_id'))->first();
        $promotionsId = $citizen->promotions->pluck('id')->toArray();

        if (in_array($promotionId, $promotionsId)) {
            return [
                'status' => false,
                'message' => 'Акція вже приєднана'
            ];
        }

        $citizen->promotions()->attach($promotionId);

        $citizen = Citizen::with('promotions')->where('id', $request->input('citizen_id'))->first();

        $citizen = $this->prepareCitizen($citizen);

        return [
            'status' => true,
            'citizen' => $citizen,
            'message' => 'Акція приєднана'
        ];
    }

    public function prepareCitizen($citizen) {

        $citizen->birthDay = $citizen->getBirthDate();
        $citizen->black_list = $citizen->isInBlackList();
        $citizen->office = $citizen->getOfficeTitle();
        $citizen->elective_plot = $citizen->getElectivePlotTitle();
        $citizen->street = $citizen->getStreetTitle();
        $citizen->house = $citizen->getHouseTitle();
        $citizen->flat = $citizen->getFlatTitle();
        $citizen->entrance = $citizen->getEntranceTitle();
        $citizen->floor = $citizen->getFloorTitle();
        $citizen->type_list = $citizen->getListTitle();
        $citizen->list_reason = $citizen->getListReason();
        $citizen->statuses = explode(',<br>', $citizen->index_status);
        $citizen->search_categories = explode(',<br>', $citizen->index_category);

        return $citizen;
    }

}