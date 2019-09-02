<?php

namespace App\Nova\Filters;

use App\Models\CitizensStatus;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class CitizenStatusFilter extends Filter
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
