<?php

namespace App\Nova;

use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class HousesCitizen extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\HouseCitizen';

    public static $displayInNavigation = false;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    public static function singularLabel()
    {
        return '';
    }

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
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            NovaBelongsToDepend::make(__('Вулиця'), 'street', 'App\Nova\Street')
                ->options(\App\Models\Street::all()),

            NovaBelongsToDepend::make(__('Будинок'), 'house', 'App\Nova\House')
                ->optionsResolve(function ($street) {
                    // Reduce the amount of unnecessary data sent
                    return $street->houses()->get(['id', 'title']);
                })
                ->dependsOn('street'),

            Select::make(__('Приватний будинок'), 'is_private')->options([
                0 => 'Ні',
                1 => 'Так'
            ]),

            /*Boolean::make(__('Приватний будинок'), 'is_private')
                ->trueValue(1)
                ->falseValue(0)
                ->hideFromIndex(),*/

            NovaDependencyContainer::make([
                Text::make(__('Квартира'), 'flat_number')
                    ->sortable()
                    ->rules('required', 'max:255'),

                Text::make(__("Під'їзд"), 'entrance')
                    ->sortable()
                    ->rules('required', 'max:255', function ($attribute, $value, $fail) {
                        $house = \App\Models\House::find(\request()->get('house'));
                        if ($house->entrances_number < $value) {
                            return $fail("Неправильний номер під'їзду! У домі " . $house->entrances_number . " під'їзд(ів)");
                        }
                    }),

                Text::make(__('Поверх'), 'floor')
                    ->sortable()
                    ->rules('required', 'max:255', function ($attribute, $value, $fail) {
                        $house = \App\Models\House::find(\request()->get('house'));
                        if ($house->floors_number < $value) {
                            return $fail("Неправильний номер під'їзду! У домі " . $house->floors_number . " поверх(ів)");
                        }
                    }),
            ])->dependsOn('is_private', '0'),
            BelongsTo::make(__('Громадянин'), 'citizen', 'App\Nova\Citizen')->searchable(),

            /*BelongsTo::make(__('Cтатус') ,'citizen_status','App\Nova\CitizensStatus')->nullable(),*/

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
