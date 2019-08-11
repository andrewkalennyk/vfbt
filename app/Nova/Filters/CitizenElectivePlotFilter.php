<?php

namespace App\Nova\Filters;

use App\Models\Street;
use AwesomeNova\Filters\DependentFilter;
use Illuminate\Http\Request;

class CitizenElectivePlotFilter extends DependentFilter
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
        $streetsIds = Street::where('elective_plot_id', $value)->pluck('id');

        return $query->whereHas('house_citizens', function ($subQuery) use($streetsIds) {
            return $subQuery->whereIn('street_id', $streetsIds);
        });

    }

}
