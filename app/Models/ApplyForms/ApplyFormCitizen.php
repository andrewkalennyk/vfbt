<?php

namespace App\Models\ApplyForms;

use App\Models\Citizen;
use App\Models\ElectivePlot;
use App\Models\House;
use App\Models\HouseCitizen;
use App\Models\Office;
use App\Models\Street;

class ApplyFormCitizen extends Citizen
{
    protected $inputData = [];
    protected $prepareData = [];
    protected $citizen;

    /**
     * @param array $inputData
     */
    public function setInputData(array $inputData)
    {
        $this->inputData = $inputData;
        $this->inputData['date_birth'] = date('Y-m-d',strtotime($this->inputData['date_birth']));
    }


    public function apply()
    {
        $this->citizen = self::create($this->inputData);
        $this->attachCitizenHouse();
        return $this->prepareCitizen();
    }

    public function attachCitizenHouse()
    {
        HouseCitizen::create(
            [
                'house_id' => $this->inputData['house_id'],
                'citizen_id' => $this->citizen->id,
                'citizen_status_id' => !empty($this->inputData['status_id']) ? $this->inputData['status_id'] : NULL,
                'flat_number' => $this->inputData['flat_number'],
            ]
        );
    }

    public function prepareCitizen()
    {
        $electivePlot = ElectivePlot::find($this->inputData['elective_plot_id']);
        $street = Street::find($this->inputData['street_id']);
        $house = House::find($this->inputData['house_id']);

        $this->citizen->category = $this->citizen->getCategoryTitle();
        $this->citizen->birthDay = $this->citizen->getBirthDate();
        $this->citizen->black_list = $this->citizen->isInBlackList();
        $this->citizen->office = $electivePlot->office->title;
        $this->citizen->elective_plot = $electivePlot->title;
        $this->citizen->street = $street->title;
        $this->citizen->house = $house->title;
        $this->citizen->flat = $this->inputData['flat_number'];
        return $this->citizen;
    }




}