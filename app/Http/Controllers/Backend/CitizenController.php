<?php
namespace App\Http\Controllers\Backend;

use App\Http\Requests\ApplyFormCitizenRequest;
use App\Models\ApplyForms\ApplyFormCitizen;

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

}