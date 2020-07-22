<?php

namespace App\Traits;

use App\Models\Revision;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

trait PrepareFindInfo
{
    public function getCategoryTitle()
    {
        return $this->citizens_category ? $this->citizens_category->title : '—';
    }

    public function getBirthDate()
    {
        return $this->date_birth ?? '—';
    }

    public function isInBlackList()
    {
        return $this->is_in_black == 1 ? 'Так' : 'Ні';
    }

    public function getOfficeTitle()
    {
        $houseCitizen = $this->house_citizens;
        if ($houseCitizen && $houseCitizen->house) {
            $house = $houseCitizen->house;
            if ($house->elective_plot && $house->elective_plot->office) {
                return $house->elective_plot->office->title;
            }
            return '-';
        }
        return  '-';
        //return !empty($this->general_info->office) ? $this->general_info->office->title : '—';
    }

    public function getElectivePlotTitle()
    {
        $houseCitizen = $this->house_citizens;
        if ($houseCitizen && $houseCitizen->house) {
            $house = $houseCitizen->house;
            if ($house->elective_plot) {
                return $house->elective_plot->title;
            }
            return '-';
        }
        return  '-';

    }

    public function getStreetTitle()
    {
        return !empty($this->general_info->street) ? $this->general_info->street->title : '—';
    }

    public function getHouseTitle()
    {
        return !empty($this->general_info->house) ? $this->general_info->house->index_title : '—';
    }

    public function getFlatTitle()
    {
        return !empty($this->general_info->flat_number) ? $this->general_info->flat_number : '';
    }

    public function getListTitle()
    {
        return $this->type_list ? ($this->type_list == 'grey' ? 'Сірий' : 'Чорний') : '-';
    }

    public function getListReason()
    {
        return $this->bad_list_reason ? $this->bad_list_reason->message : '-';
    }

    public function getEntranceTitle()
    {
        return $this->house_citizens ? $this->house_citizens->entrance : '';
    }

    public function getFloorTitle()
    {
        return $this->house_citizens ? $this->house_citizens->floor : '';
    }
}
