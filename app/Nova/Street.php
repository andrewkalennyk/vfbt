<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Street extends HandBookResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Street';

    public static $group = 'Облік';

    public static function label()
    {
        return 'Вулиці';
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

            Text::make(__('Назва'),'title')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsTo::make(__('Дільниця'), 'elective_plot', 'App\Nova\ElectivePlot'),

            BelongsToMany::make(__('Дільниці'), 'electivePlots','App\Nova\ElectivePlot'),

            HasMany::make(__('Будинки'), 'houses', 'App\Nova\House')
        ];
    }

    public static function indexQuery(NovaRequest $request, $query)
    {
        $user = $request->user();
        if ($user->isCoordinator()) {
            $electivePlot = \App\Models\ElectivePlot::where('office_id', $user->getCoordinatorsOfficeId())
                ->pluck('id');
            $query = $query->where('elective_plot_id', $electivePlot);
        }

        return $query;
    }

}
