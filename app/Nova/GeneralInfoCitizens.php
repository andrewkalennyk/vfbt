<?php

namespace App\Nova;

use App\Nova\Filters\GeneralInfoElectivePlot;
use App\Nova\Filters\GeneralInfoOffices;
use AwesomeNova\Filters\DependentFilter;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use NrmlCo\NovaBigFilter\NovaBigFilter;

class GeneralInfoCitizens extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\GeneralInfoCitizen';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Office'),

            BelongsTo::make('ElectivePlot', 'elective_plot'),

            BelongsTo::make('Street'),

            BelongsTo::make('House'),

            Text::make(__('Квартира'),'flat_number')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsTo::make('Citizen'),

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
        return [
            new NovaBigFilter,
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new GeneralInfoOffices(),
            new GeneralInfoElectivePlot()
        ];
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
