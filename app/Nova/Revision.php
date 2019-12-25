<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Revision extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Revision';

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
        'id',
    ];

    public static $group = 'Користувачі';

    public static function label()
    {
        return 'Логування';
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

            BelongsTo::make(__('Користувач'), 'user' ,'App\Nova\User'),

            Text::make(__('Ресурс'), 'class_name')
                ->withMeta(['extraAttributes' => [
                    'readonly' => true
                ]]),

            Text::make(__('Тип'), 'type')
                ->withMeta(['extraAttributes' => [
                    'readonly' => true
                ]]),

            Text::make(__('Старе значення'), 'old_value')
                ->withMeta(['extraAttributes' => [
                    'readonly' => true
                ]])
                ->asHtml()
                ->nullable(),

            Text::make(__('Нове значення'), 'new_value')
                ->withMeta(['extraAttributes' => [
                    'readonly' => true
                ]])
                ->asHtml()
                ->nullable(),

            Text::make(__('Силка'), 'link')
                ->asHtml()
                ->nullable(),

            DateTime::make(__('Дата Створення'), 'created_at'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public static function availableForNavigation(Request $request)
    {
        return true;
    }
}
