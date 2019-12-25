<?php

namespace App\Nova\Filters;

use App\Models\ElectivePlot;
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
        $electivePlot = ElectivePlot::with('streets')->find($value);

        $streetsIds = $electivePlot->streets->pluck('id');

        return $query->whereHas('house_citizens', function ($subQuery) use($streetsIds) {
            return $subQuery->whereIn('street_id', $streetsIds);
        });

    }

}
