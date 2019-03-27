<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
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

    public static $group = 'Учет';

    public static $displayInNavigation = true;

    public static function label()
    {
        return 'Участки';
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

            Text::make(__('Название'),'title')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsTo::make('Office'),

            HasMany::make('Street','streets')
        ];
    }

}
