<?php

namespace App\Nova\Filters;

use App\Models\HouseCitizen;
use AwesomeNova\Filters\DependentFilter;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class CitizenStreetHouseFilter extends DependentFilter
{

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
                    if (!empty($filter->filter->attribute) && in_array($filter->filter->attribute, ['house_id', 'street_id'])) {
                        $subQuery = $subQuery->where($filter->filter->attribute, $filter->value);
                    }

                }
            }

            return $subQuery;
        });
    }

}
