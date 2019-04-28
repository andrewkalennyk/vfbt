<?php

namespace App\Nova\Metrics;

use App\Models\GeneralInfoCitizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Nova\Metrics\Value;

class ElectivePlotCitizens extends Value
{
    public function name()
    {
        return __('Кількість громадян');
    }

    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function calculate(Request $request)
    {
        return $this->count($request, GeneralInfoCitizen::where('elective_plot_id', $request->resourceId));
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            30 => '30 днів',
            60 => '60 днів',
            365 => '365 днів',
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'elective-plot-citizens';
    }
}
