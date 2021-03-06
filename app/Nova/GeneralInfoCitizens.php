<?php

namespace App\Nova;

use Annyk\ImportFiles\ImportFiles;
use App\Nova\Actions\GeneralInfoAction;
use App\Nova\Filters\GeneralInfoPromotions;
use AwesomeNova\Filters\DependentFilter;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use NrmlCo\NovaBigFilter\NovaBigFilter;

class GeneralInfoCitizens extends Resource
{

    public static $searchRelations = [
        'office' => ['title','number', 'address'],
        'elective_plot' => ['title'],
        'street' => ['title'],
        'house' => ['title'],
        'citizen' => ['last_name','first_name', 'patronymic_name'],
    ];
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
        'id', 'flat_number',
    ];

    public static $group = 'Загальна інформація';

    public static function singularLabel()
    {
        return '';
    }

    public static function label()
    {
        return 'Загальна інформація';
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

            BelongsTo::make('Громадська приймальня','office','App\Nova\Office'),

            BelongsTo::make('Дільниця', 'elective_plot','App\Nova\ElectivePlot'),

            BelongsTo::make('Вулиця','street','App\Nova\Street'),

            BelongsTo::make('Будинок','house','App\Nova\House'),

            Text::make(__('Квартира'),'flat_number')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsTo::make('Громадянин','citizen','App\Nova\Citizen')->searchable(),

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
        return [
            (new NovaBigFilter)->setTitle(__('Filter Menux')),
            new ImportFiles()
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
            DependentFilter::make('Приймальня','office_id')
                ->withOptions(function (Request $request, $filters) {
                    return \App\Models\Office::pluck('title', 'id');
                }),
            DependentFilter::make('Дільниця','elective_plot_id')
                ->dependentOf('office_id')
                ->withOptions(function (Request $request, $filters) {
                    return \App\Models\ElectivePlot::where('office_id', $filters['office_id'])
                        ->pluck('title', 'id');
                })
                ->hideWhenEmpty(),
            DependentFilter::make('Вулиця','street_id')
                ->dependentOf('elective_plot_id')
                ->withOptions(function (Request $request, $filters) {
                    return \App\Models\Street::where('elective_plot_id', $filters['elective_plot_id'])
                        ->pluck('title', 'id');
                })
                ->hideWhenEmpty(),
            DependentFilter::make('Будинок','house_id')
                ->dependentOf('street_id')
                ->withOptions(function (Request $request, $filters) {
                    return \App\Models\House::where('street_id', $filters['street_id'])
                        ->pluck('title', 'id');
                })
                ->hideWhenEmpty(),

            new GeneralInfoPromotions,
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
        return [
            (new GeneralInfoAction),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        $user = $request->user();
        if ($user->isCoordinator()) {
            $query = $query->where('office_id', $user->getCoordinatorsOfficeId());
        }

        return $query;
    }

    public static function availableForNavigation(Request $request)
    {
        return true;
    }
}
