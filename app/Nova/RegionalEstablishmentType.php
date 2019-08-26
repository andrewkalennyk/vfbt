<?php

namespace App\Nova;

use Annyk\NovaDependency\NovaDependency;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class RegionalEstablishmentType extends HandBookResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\RegionalEstablishmentType';

    public static function label()
    {
        return 'Тип Районного закладу';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make(__('Назва'),'title')
                ->sortable()
                ->rules('required', 'max:255'),

            HasMany::make(__('Заклади'),'regionalEstablishments','App\Nova\RegionalEstablishment'),

        ];
    }
}
