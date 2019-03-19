<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Citizen extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Citizen';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */

    public function title()
    {
        return $this->last_name . ' ' . $this->first_name . ' '. $this->patronymic_name;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'last_name','first_name', 'patronymic_name',
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

            Text::make(__('Фамилия'),'last_name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make(__('Имя'),'first_name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make(__('Отчество'),'patronymic_name')
                ->sortable()
                ->rules('required', 'max:255'),

            Date::make(__('Дата Рождения'), 'date_birth')
                ->displayUsing(function ($date) {
                    return $date->format('d-m-Y');
                }),

            Text::make(__('Телефон'),'phone')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsTo::make('CitizensCategory','citizens_category'),

            Text::make(__('# cert'),'certificate_number')
                ->sortable()
                ->rules('required', 'max:255'),

            //BelongsToMany::make('Promotion','promotions')
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
