<?php

namespace App\Nova;

use Annyk\NovaDependency\NovaDependency;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use NovaAjaxSelect\AjaxSelect;
use App\Models\CitizensStatus;
use App\Models\Street;
use App\Models\RegionalEstablishmentType;
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
        $responsibleId = CitizensStatus::byType('responsible')->first()->id;
        $parentComiteeId = CitizensStatus::byType('parent_committee')->first()->id;
        //$otherIds = CitizensStatus::byType(null)->pluck('id')->toArray();

        return [
            ID::make()->sortable(),

            BelongsTo::make(__('Громадянин') ,'citizen','App\Nova\Citizen')->searchable(),

            Select::make(__('Cтатус'), 'citizen_status_id')
                ->options(CitizensStatus::pluck('title','id'))->displayUsingLabels(),

            BelongsTo::make(__('Cтатус 2 категорія'), 'citizen_sub_status', 'App\Nova\CitizensSubStatus')->exceptOnForms(),

            Text::make(__('Докладніше'),'details')->exceptOnForms(),

            NovaDependency::make([
                Select::make(__('Вулиця'), 'street_id')
                    ->options(Street::pluck('title','id'))
                    ->displayUsingLabels(),

                AjaxSelect::make(__('Будинок'), 'house_id')
                    ->get('/get-houses-by-street/{street_id}')
                    ->parent('street_id'),

                AjaxSelect::make(__("Під'їзд"), 'entrance')
                    ->get('/get-entities-by-house/{house_id}/entrances_number')
                    ->parent('house_id')
            ])->dependsOn('citizen_status_id', $responsibleId),

            NovaDependency::make([
                Select::make(__('Тип Районого закладу'), 'regional_establishment_type_id')
                    ->options(RegionalEstablishmentType::pluck('title','id'))
                    ->displayUsingLabels(),

                AjaxSelect::make(__("Заклад"), 'regional_establishment_id')
                    ->get('/get-regional-establishment-by-type/{regional_establishment_type_id}')
                    ->parent('regional_establishment_type_id')

            ])->dependsOn('citizen_status_id', $parentComiteeId),

            AjaxSelect::make(__('Cтатус 2 категорія'), 'citizen_sub_status_id')
                ->get('/get-sub-status-by-status/{citizen_status_id}')
                ->parent('citizen_status_id'),




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
