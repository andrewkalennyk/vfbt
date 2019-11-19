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
        return !empty($this->general_info->office) ? $this->general_info->office->title : '—';
    }

    public function getElectivePlotTitle()
    {
        return !empty($this->general_info->elective_plot) ? $this->general_info->elective_plot->title : '—';
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
}
