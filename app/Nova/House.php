<?php

namespace App\Nova;

use Annyk\NovaDependency\NovaDependency;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use NovaAjaxSelect\AjaxSelect;
use App\Models\ElectivePlot;
use App\Models\Street;
use App\Models\House as HouseModel;

class House extends HandBookResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\House';

    public static $group = 'Облік';

    public static $perPageViaRelationship = 15;

    public static function label()
    {
        return 'Будинки';
    }

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

            /*for views*/
            Text::make(__('Назва'), 'index_title')->sortable()->onlyOnIndex(),
            BelongsTo::make(__('Дільниця'), 'elective_plot', 'App\Nova\ElectivePlot')->exceptOnForms(),
            BelongsTo::make(__('Вулиця'), 'street', 'App\Nova\Street')->exceptOnForms(),
            /*for views*/

            Text::make(__('Назва'), 'title')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Select::make(__('Тип'), 'type')
                ->options([
                    HouseModel::HOUSE_TYPE => 'Будинок',
                    HouseModel::PRIVATE_TYPE => 'Приватний будинок',
                    HouseModel::DISTRICT_TYPE => 'Районний заклад',
                    HouseModel::SPECIAL_SECTION_TYPE => 'Спец дільниця',
                ])
                ->nullable()
                ->displayUsingLabels(),

            /*except district*/
            NovaDependency::make([
                Select::make(__('Дільниця'), 'elective_plot_id')
                    ->options(ElectivePlot::pluck('title','id'))->displayUsingLabels(),

                AjaxSelect::make(__('Вулиця'), 'street_id')
                    ->get('/get-street-by-elective-plot/{elective_plot_id}')
                    ->parent('elective_plot_id'),
            ])->dependsOnFalse('type', 'district')->onlyOnForms(),

            /*only if house*/
            NovaDependency::make([
                Text::make(__('Кількість квартир'), 'flat_number')
                    ->sortable()
                    ->rules('required', 'max:255'),

                Text::make(__("Кількість під'їздів"), 'entrances_number')
                    ->sortable()
                    ->rules('required', 'max:255'),

                Text::make(__('Кількість поверхів'), 'floors_number')
                    ->sortable()
                    ->rules('required', 'max:255'),
            ])->dependsOn('type', 'house')->onlyOnForms(),

            /*only if district*/
            NovaDependency::make([
                Select::make(__('Вулиця'), 'street_id')->options(Street::pluck('title','id'))->hideFromDetail(),
            ])->dependsOn('type', 'district')->onlyOnForms(),

            HasMany::make(__('Громадяни'), 'house_citizens', 'App\Nova\HousesCitizen')->onlyOnDetail(false)
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        $user = $request->user();
        if ($user->isCoordinator()) {
            $electivePlot = ElectivePlot::where('office_id', $user->getCoordinatorsOfficeId())
                ->pluck('id');
            $streets = Street::where('elective_plot_id', $electivePlot)->pluck('id');
            $query = $query->where('street_id', $streets);
        }

        return $query;
    }
}
