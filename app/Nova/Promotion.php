<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Promotion extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Promotion';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */

    public static $group = 'Акції';

    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','title','description'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public static function singularLabel()
    {
        return '';
    }

    public static function label()
    {
        return 'Акції';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make(__('Назва'),'title')
                ->sortable()
                ->rules('required', 'max:255'),

            Textarea::make(__('Опис'),'description'),

            Date::make(__('Дата старту'), 'start_date')
                ->displayUsing(function ($date) {
                    return $date->format('d-m-Y');
                }),
            Date::make(__('Дата фінішу'), 'finish_date')
                ->displayUsing(function ($date) {
                    return $date->format('d-m-Y');
                }),

            BelongsToMany::make(__('Громадяни'), 'citizens', 'App\Nova\Citizen')
                ->searchable()
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
