<?php

namespace App\Nova\Filters;

use App\Models\CitizensCategory;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class CitizensCategoryFilter extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    public $name = 'Категорії';

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
        return $query->whereHas('categories', function ($subQuery) use($value) {
            return $subQuery->where('citizens_category_id', $value);
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
        return CitizensCategory::select('id','title')->orderBy('title','asc')->pluck('id','title');
    }
}
