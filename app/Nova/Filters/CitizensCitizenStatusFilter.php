<?php

namespace App\Nova\Filters;

use App\Models\CitizensStatus;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class CitizensCitizenStatusFilter extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    public $name = 'Статуси';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->whereHas('citizen_statuses', function ($subQuery) use($value) {
            return $subQuery->where('citizen_status_id', $value);
        });
    }


    /*QL: select * from `citizens`
    where exists (select * from `citizen_citizen_statuses` where `citizens`.`id` = `citizen_citizen_statuses`.`citizen_id` and `citizens_status_id` = 1)
    order by `citizens`.`id` desc limit 11 offset 0*/
    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return CitizensStatus::select('id','title')->pluck('id','title');
    }
}
