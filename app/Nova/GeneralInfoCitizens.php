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

    public static $group = 'Общая информация';

    public static function label()
    {
        return 'Общая информация';
    }

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

            BelongsTo::make('Общественная приемная','office','App\Nova\Office'),

            BelongsTo::make('Участок', 'elective_plot','App\Nova\ElectivePlot'),

            BelongsTo::make('Улица','street','App\Nova\Street'),

            BelongsTo::make('Дом','house','App\Nova\House'),

            Text::make(__('Квартира'),'flat_number')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsTo::make('Гражданин','citizen','App\Nova\Citizen'),

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
            DependentFilter::make('GeneralInfoOffices','office_id')
                ->withOptions(function (Request $request, $filters) {
                    return \App\Models\Office::pluck('title', 'id');
                }),

            DependentFilter::make('GeneralInfoElectivePlot','elective_plot_id')
                ->dependentOf('office_id')
                ->withOptions(function (Request $request, $filters) {
                    return \App\Models\ElectivePlot::where('office_id', $filters['office_id'])
                        ->pluck('title', 'id');
                }),
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
