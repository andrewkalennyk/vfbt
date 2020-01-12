<?php

namespace App\Nova\Filters;

use AwesomeNova\Filters\DependentFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CitizenStreetHouseFilter extends DependentFilter
{

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        $filters = json_decode(base64_decode($request->get('filters')), true);

        return $query->whereHas('house_citizens', function ($subQuery) use ($filters) {

            if ($filters) {
                foreach ($filters as $filter) {
                    $class = Arr::get($filter, 'class');
                    $value = Arr::get($filter, 'value');
                    if (in_array($class, ['house_id', 'street_id']) && $value) {
                        $subQuery = $subQuery->where($class, $value);
                    }
                }
            }
            return $subQuery;
        });


    }

}
