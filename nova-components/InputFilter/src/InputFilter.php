<?php

namespace Annyk\InputFilter;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class InputFilter extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'input-filter';

    /**
     * @var string
     */
    public $attribute;


    /**
     * RelatedFilter constructor.
     * @param null $name
     * @param null $attribute
     */
    public function __construct($name = null, $attribute = null)
    {
        $this->name = $name ?? $this->name;
        $this->attribute = $attribute ?? $this->attribute ?? str_replace(' ', '_', Str::lower($this->name()));
    }

    public function options(Request $request)
    {
        return [];
    }

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
        dd($value);
        return $query->where($this->attribute, $value);
    }

    /**
     * @param  mixed[] ...$args
     * @return static
     */
    public static function make(...$args)
    {
        return new static(...$args);
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}
