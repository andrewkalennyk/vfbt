<?php

namespace App\Nova;

use Annyk\NovaDependency\NovaDependency;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class CitizensStatus extends HandBookResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\CitizensStatus';

    public static function label()
    {
        return 'Статус громадянина';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make(__('Назва'),'title')
                ->sortable()
                ->rules('required', 'max:255'),

            Select::make(__('Тип'), 'type')
                ->options(
                    [
                        'responsible' => 'відповідальний',
                        'parent_committee' => 'голова батьківського комітету'
                    ]
                )
                ->displayUsingLabels()
                ->nullable(),


            HasMany::make(__('Статус 2 рівня'), 'citizen_sub_statuses', 'App\Nova\CitizensSubStatus')


        ];
    }
}
