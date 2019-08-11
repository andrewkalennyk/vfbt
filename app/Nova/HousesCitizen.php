<?php

namespace App\Nova;

use Annyk\CheckboxDependent\CheckboxDependent;
use Annyk\NovaDependency\NovaDependency;
use Epartment\NovaDependencyContainer\HasDependencies;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use NovaAjaxSelect\AjaxSelect;

class HousesCitizen extends Resource
{
    use HasDependencies;
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

            BelongsTo::make(__('Вулиця'), 'street', 'App\Nova\Street'),

            AjaxSelect::make(__('Будинок'), 'house_id')
                ->get('/get-houses-by-street/{street}')
                ->parent('street'),

            CheckboxDependent::make(__('Приватний будинок'), 'is_private')
                ->trueValue(1)
                ->falseValue(0)
                ->hideFromIndex()
                ->depends('house_id')
                ->get('/get-is-private-by-house/{house_id}'),

            AjaxSelect::make(__("Під'їзд"), 'entrance')
                ->get('/get-entities-by-house/{house_id}/entrances_number')
                ->parent('house_id'),

            AjaxSelect::make(__('Поверх'), 'floor')
                ->get('/get-entities-by-house/{house_id}/floors_number')
                ->parent('house_id'),


            NovaDependency::make([
                Text::make(__('Квартира'), 'flat_number')
                    ->sortable()
                    ->rules('required', 'max:255'),
            ])->dependsOnFalse('is_private', 1),
            BelongsTo::make(__('Громадянин'), 'citizen', 'App\Nova\Citizen')->searchable(),

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
