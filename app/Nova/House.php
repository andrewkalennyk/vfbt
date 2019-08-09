<?php

namespace App\Nova;

use Annyk\NovaDependency\NovaDependency;
use App\Models\HouseCitizensFields;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class House extends HandBookResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\House';

    public static $group = 'Облік';

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

            Text::make(__('Назва'), 'title')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make(__('Кількість квартир'), 'flat_number')
                ->sortable()
                ->rules('required', 'max:255'),

            Boolean::make(__('Приватний будинок'), 'is_private')
                ->trueValue(1)
                ->falseValue(0)
                ->hideFromIndex(),

            NovaDependency::make([
                Text::make(__("Кількість під'їздів"), 'entrances_number')
                    ->sortable()
                    ->rules('required', 'max:255'),

                Text::make(__('Кількість поверхів'), 'floors_number')
                    ->sortable()
                    ->rules('required', 'max:255'),
            ])->dependsOnFalse('is_private', 1),

            BelongsTo::make(__('Вулиця'), 'street', 'App\Nova\Street'),

            BelongsTo::make(__('Дільниця'), 'elective_plot', 'App\Nova\ElectivePlot'),

            HasMany::make(__(''), 'house_citizens', 'App\Nova\HousesCitizen')->onlyOnDetail(false)
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
