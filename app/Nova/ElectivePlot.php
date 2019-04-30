<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class ElectivePlot extends HandBookResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\ElectivePlot';

    public static $group = 'Облік';

    public static $displayInNavigation = true;

    public static function label()
    {
        return 'Дільниці';
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

            Markdown::make(__('Додаткова інформація'), 'description')->alwaysShow(),

            BelongsTo::make(__('Громадська приймальня'), 'office','App\Nova\Office'),

            HasMany::make(__('Вулиці'),'streets','App\Nova\Street')
        ];
    }

    public function cards(Request $request)
    {
        return [
            (new Metrics\ElectivePlotCitizens())->onlyOnDetail(),
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

}
