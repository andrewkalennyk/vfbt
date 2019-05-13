<?php

namespace App\Models\ApplyForms;

use App\Models\Citizen;
use App\Models\HouseCitizen;
use phpDocumentor\Reflection\Types\Null_;

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
        $this->citizen->category = $this->citizen->getCategoryTitle();
        $this->citizen->birthDay = $this->citizen->getBirthDate();
        $this->citizen->black_list = $this->citizen->isInBlackList();
        $this->citizen->office = $this->citizen->getOfficeTitle();
        $this->citizen->elective_plot = $this->citizen->getElectivePlotTitle();
        $this->citizen->street = $this->citizen->getStreetTitle();
        $this->citizen->house = $this->citizen->getHouseTitle();
        $this->citizen->flat = $this->citizen->getFlatTitle();
        dr($this->citizen);
        return $this->citizen;
    }




}