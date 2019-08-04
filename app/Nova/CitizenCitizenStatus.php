<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;

class CitizenCitizenStatus extends HandBookResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\CitizenCitizenStatus';

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
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make(__('Громадянин') ,'citizen','App\Nova\Citizen')->searchable(),

            NovaBelongsToDepend::make(__('Cтатус') , 'citizen_status', 'App\Nova\CitizensStatus')
                ->options(\App\Models\CitizensStatus::all())
                ->nullable(),

            NovaBelongsToDepend::make(__('Cтатус 2 категорія') ,'citizen_sub_status','App\Nova\CitizensSubStatus')
                ->dependsOn('citizen_status')
                ->optionsResolve(function ($citizenStatus) {
                    // Reduce the amount of unnecessary data sent
                    return $citizenStatus->citizen_sub_statuses()->get(['id','title']);
                })
                ->nullable(),

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
