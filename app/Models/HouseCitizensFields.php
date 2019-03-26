<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 3/22/19
 * Time: 2:31 PM
 */

namespace App\Models;


use Laravel\Nova\Fields\Select;

class HouseCitizensFields
{

    public function __invoke()
    {
        $statuses = CitizensStatus::select('id','title')->get()->pluck('title','id')->toArray();
        return [
            Select::make(__('Статус'),'citizen_status_id')
                ->options($statuses)
                ->displayUsing(function() {
                    return isset($this->pivot) ? $this->pivot->citizen_status_id : '-';
                })
        ];
    }
}