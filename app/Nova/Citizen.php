<?php

namespace App\Nova;

use App\Models\CitizenPromotion;
use App\Models\GeneralInfoCitizen;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
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

    public static $group = 'Облік';

    public static function label()
    {
        return 'Громадяни';
    }

    public static function singularLabel()
    {
        return '';
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */

    public function title()
    {
        $blacklist = $this->is_in_black == 1 ? ' (УВАГА)' : '';
        return $this->last_name . ' ' . $this->first_name . ' '. $this->patronymic_name . $blacklist;
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
                })
                ->hideFromIndex(),

            Text::make(__('Телефон'),'phone')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsTo::make('Категория','citizens_category','App\Nova\CitizensCategory')
                ->nullable(),

            Text::make(__('# посв'),'certificate_number')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Boolean::make(__('Black list'), 'is_in_black')
                ->trueValue(1)
                ->falseValue(0)
                ->hideFromIndex(),

            HasOne::make(__('Будинок'),'house_citizens', 'App\Nova\HousesCitizen')->canSee(function () {
                $user = \request()->user();
                return ($user->isSuperAdmin() || $user->isCoordinator()) ? true : false;
            }),

            BelongsToMany::make(__('Акції'),'promotions','App\Nova\Promotion'),

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

    public static function indexQuery(NovaRequest $request, $query)
    {
        $user = $request->user();
        if ($user->isCoordinator()) {
            $generalInfo = GeneralInfoCitizen::all();
            $userIds = self::$model::whereNotIn('id', $generalInfo->pluck('citizen_id'))->pluck('id');
            $usersOfficeIds = $generalInfo->where('office_id', $user->getCoordinatorsOfficeId())->pluck('citizen_id');
            $ids = $userIds->merge($usersOfficeIds);
            $query = $query->whereIn('id', $ids);
        }

        return $query;
    }
}
