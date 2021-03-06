<?php

namespace App\Nova\Filters;

use Andrewkalennyk\CustomFilter\CustomFilter;
use App\Models\Office;
use AwesomeNova\Filters\DependentFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Nova\Filters\Filter;

class GeneralInfoOffices extends DependentFilter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    public $name = 'Общественная приемная';

    public $attribute = 'office_id';

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
        return $query->where('office_id',$value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        return Office::select('id','title')->pluck('id','title');
    }
}
