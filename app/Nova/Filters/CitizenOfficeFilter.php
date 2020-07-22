<?php

namespace App\Nova\Filters;

use App\Models\ElectivePlot;
use App\Models\Street;
use AwesomeNova\Filters\DependentFilter;
use Illuminate\Http\Request;

class CitizenOfficeFilter extends DependentFilter
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
        $electivePlotIds = ElectivePlot::where('office_id', $value)->pluck('id');

        $streetsIds = Street::whereHas('electivePlots', function ($subQuery) use($electivePlotIds) {
            $subQuery->whereIn('elective_plot_id', $electivePlotIds);
        })->pluck('id');

        return $query->whereHas('house_citizens', function ($subQuery) use($streetsIds) {
            return $subQuery->whereIn('street_id', $streetsIds);
        });
    }


}
