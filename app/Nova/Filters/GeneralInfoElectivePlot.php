<?php

namespace App\Nova\Filters;

use App\Models\ElectivePlot;
use AwesomeNova\Filters\DependentFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Laravel\Nova\Filters\Filter;

class GeneralInfoElectivePlot extends DependentFilter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    public $name = 'Участок';

    //public $attribute = 'elective_plot_id';

    public $dependentOf = ['office_id'];

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
        return $query->where('elective_plot_id',$value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request, array $filters = [])
    {
        return ElectivePlot::select('id','title')->pluck('id','title');
    }
}
