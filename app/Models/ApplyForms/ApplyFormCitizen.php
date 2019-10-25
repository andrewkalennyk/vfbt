<?php

namespace App\Models\ApplyForms;

use App\Models\Citizen;
use App\Models\CitizenCitizenStatus;
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
    protected $houseCitizen;


    /**
     * @param array $inputData
     */
    public function setInputData(array $inputData)
    {
        $this->inputData = $inputData;
        $this->inputData['date_birth'] = date('Y-m-d',strtotime($this->inputData['date_birth']));
        $this->inputData['is_certificate'] = !empty($this->inputData['is_certificate']) && $this->inputData['is_certificate'] == 'on' ? 1 : 0;
    }


    public function apply()
    {

        $this->citizen = Citizen::create($this->inputData);
        $this->attachCitizenHouse();
        $this->attachCitizenStatuses();
        $this->attachCitizenCategories();
        return $this->prepareCitizen();
    }

    public function attachCitizenHouse()
    {
        $address = json_decode($this->inputData['address'],true);
        $this->houseCitizen = HouseCitizen::create(
            [
                'house_id' => $address['house_id'],
                'citizen_id' => $this->citizen->id,
                'is_private' => 0,
                'flat_number' => $this->inputData['flat_number'],
            ]
        );
    }

    public function attachCitizenStatuses()
    {
        $statuses = json_decode($this->inputData['statuses'],true);
        if (count($statuses)) {
            foreach ($statuses as $status) {
                $status['values']['citizen_id'] = $this->citizen->id;
                CitizenCitizenStatus::create($status['values']);
            }
        }
    }

    public function attachCitizenCategories()
    {
        $categories = json_decode($this->inputData['citizenCategories'],true);
        if (count($categories)) {
            $categoriesId = [];
            foreach ($categories as $category) {
                $categoriesId[] = $category['id'];
            }

            $this->citizen->categories()->attach($categoriesId);
        }

    }

    public function prepareCitizen()
    {
        $this->citizen->category = $this->citizen->index_category;
        $this->citizen->birthDay = $this->citizen->getBirthDate();
        $this->citizen->black_list = $this->citizen->isInBlackList();
        $this->citizen->office = $this->houseCitizen->house->elective_plot->office->title;
        $this->citizen->elective_plot = $this->houseCitizen->house->elective_plot->title;
        $this->citizen->street = $this->houseCitizen->house->street->title;
        $this->citizen->house = $this->houseCitizen->house->title;
        $this->citizen->flat = $this->inputData['flat_number'];
        return $this->citizen;
    }




}