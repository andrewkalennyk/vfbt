<?php

namespace App\Nova;

use Annyk\NovaDependency\NovaDependency;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use NovaAjaxSelect\AjaxSelect;
use Orlyapps\NovaBelongsToDepend\NovaBelongsToDepend;
use App\Models\ElectivePlot;

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

            Text::make(__('Назва'), 'index_title')
                ->sortable()
                ->onlyOnIndex(),

            Text::make(__('Назва'), 'title')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            /*fucking ajax select*/
            BelongsTo::make(__('Вулиця'), 'street', 'App\Nova\Street')->exceptOnForms(),

            BelongsTo::make(__('Дільниця'), 'elective_plot', 'App\Nova\ElectivePlot')
                ->nullable(),

            AjaxSelect::make(__('Вулиця'), 'street_id')
                ->get('/get-street-by-elective-plot/{elective_plot}')
                ->parent('elective_plot'),

            Boolean::make(__('Приватний будинок'), 'is_private')
                ->trueValue(1)
                ->falseValue(0)
                ->hideFromIndex(),

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
            ])->dependsOnFalse('is_private', 1),

            HasMany::make(__('Громадяни'), 'house_citizens', 'App\Nova\HousesCitizen')->onlyOnDetail(false)
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        $user = $request->user();
        if ($user->isCoordinator()) {
            $electivePlot = \App\Models\ElectivePlot::where('office_id', $user->getCoordinatorsOfficeId())
                ->pluck('id');
            $streets = \App\Models\Street::where('elective_plot_id', $electivePlot)->pluck('id');
            $query = $query->where('street_id', $streets);
        }

        return $query;
    }
}
