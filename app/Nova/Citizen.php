<?php

namespace App\Nova;

use App\Models\GeneralInfoCitizen;
use App\Nova\Filters\CitizensCategoryFilter;
use App\Nova\Filters\CitizenStreetFilter;
use App\Nova\Filters\CitizenStreetHouseFilter;
use Dniccum\PhoneNumber\PhoneNumber;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use NrmlCo\NovaBigFilter\NovaBigFilter;
use Wemersonrv\InputMask\InputMask;
use NovaAjaxSelect\AjaxSelect;

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

    public static $perPageOptions = [10, 25, 50, 100];

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */

    public function title()
    {
        $blacklist = $this->is_in_black == 1 ? ' (УВАГА)' : '';
        return $this->last_name . ' ' . $this->first_name . ' ' . $this->patronymic_name . $blacklist;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'last_name', 'first_name', 'patronymic_name', 'phone', 'certificate_number', 'date_birth',
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

            Text::make(__('Фамилия'), 'last_name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make(__('Имя'), 'first_name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make(__('Отчество'), 'patronymic_name')
                ->sortable()
                ->rules('required', 'max:255'),

            /*Date::make(__('Дата Рождения'), 'date_birth')
                ->displayUsing(function ($date) {
                    return $date->format('d-m-Y');
                })
                ->hideFromIndex()
                ->format('d-m-Y')
                ->rules('required'),*/

            InputMask::make(__('Дата Рождения'), 'date_birth')
                ->sortable()
                ->mask('##-##-####')
                ->rules('required', 'max:255'),

            PhoneNumber::make(__('Телефон'), 'phone')
                ->sortable()
                ->format('+380' . '##-###-##-##')
                ->disableValidation(true)
                ->placeholder('+380__-___-__-__'),

            Text::make('Категорії', 'index_category')->onlyOnIndex()->asHtml(),

            Text::make('Статуси', 'index_status')->onlyOnIndex()->asHtml(),

            Boolean::make(__('Чи є посвідчення?'), 'is_certificate')
                ->trueValue(1)
                ->falseValue(0)
                ->hideFromIndex(),

            NovaDependencyContainer::make([
                Text::make(__('№ посв'), 'certificate_number')
                    ->sortable()
                    ->rules('required', 'max:255')
                    ->creationRules('unique:citizens,certificate_number')
                    ->updateRules('unique:citizens,certificate_number,{{resourceId}}')
                    ->hideFromIndex(),
            ])->dependsOnNotEmpty('is_certificate'),

            Boolean::make(__('У списку!'), 'is_in_black')
                ->trueValue(1)
                ->falseValue(0)
                ->hideFromIndex(),

            NovaDependencyContainer::make([
                Select::make(__('Тип'), 'type_list')->options([
                    'grey' => 'Grey',
                    'black' => 'Black'
                ]),

                AjaxSelect::make(__('Повідомлення'), 'bad_list_reason_id')
                    ->get('/api/type-list/{type_list}')
                    ->parent('type_list')

            ])->dependsOnNotEmpty('is_in_black'),

            /*fucking costyl to show ajaxSelect above! todo:// make own package for dependencies */
            BelongsTo::make(__('Повідомлення'), 'bad_list_reason', 'App\Nova\BadListReasons')
                ->nullable()
                ->hideWhenCreating()
                ->hideWhenUpdating()
                ->hideFromIndex(),


            HasOne::make(__('Будинок'), 'house_citizens', 'App\Nova\HousesCitizen')->canSee(function () {
                $user = \request()->user();
                return ($user->isSuperAdmin() || $user->isCoordinator()) ? true : false;
            }),

            BelongsToMany::make(__('Акції'), 'promotions', 'App\Nova\Promotion'),

            BelongsToMany::make(__('Категорії'), 'categories', 'App\Nova\CitizensCategory'),

            HasMany::make(__('Статуси'), 'citizen_statuses', 'App\Nova\CitizenCitizenStatus')->canSee(function () {
                $user = \request()->user();
                return ($user->isSuperAdmin() || $user->isCoordinator()) ? true : false;
            }),

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
        return [
            (new NovaBigFilter)->setTitle(__('Filter Menux')),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            CitizenStreetHouseFilter::make('Вулиця', 'street_id')
                ->withOptions(function (Request $request, $filters) {
                    return \App\Models\Street::pluck('title', 'id');
                })
                ->hideWhenEmpty(),
            CitizenStreetHouseFilter::make('Будинок', 'house_id')
                ->dependentOf('street_id')
                ->withOptions(function (Request $request, $filters) {
                    return \App\Models\House::where('street_id', $filters['street_id'])
                        ->pluck('title', 'id');
                })
                ->hideWhenEmpty(),
            new CitizensCategoryFilter()

        ];
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

    public static function availableForNavigation(Request $request)
    {
        return true;
    }
}
