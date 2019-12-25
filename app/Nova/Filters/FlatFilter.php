<?php

namespace App\Nova\Filters;

use App\Models\HouseCitizen;
use AwesomeNova\Filters\DependentFilter;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class FlatFilter extends DependentFilter
{

    public $hideWhenEmpty = true;

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
        $filters = $request->filters();


        return $query->whereHas('house_citizens', function ($subQuery) use($filters) {

            if ($filters) {
                foreach ($filters as $filter) {
                    if (in_array($filter->filter->attribute, ['flat_number'])) {
                        $subQuery = $subQuery->where($filter->filter->attribute, $filter->value);
                    }

                }
            }

            return $subQuery;
        });
    }

}
