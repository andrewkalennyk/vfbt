<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class BadListReasons extends HandBookResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\BadListReason';

    public static $displayInNavigation = true;

    public static $globallySearchable = false;

    public static function label()
    {
        return 'Причини попадання у список';
    }

    public static $title = 'message';


    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Select::make(__('Тип'), 'type')->options([
                'grey' => 'Grey',
                'black' => 'Black'
            ]),

            Text::make(__('Повідомлення'), 'message')
                ->rules('required', 'max:255'),
        ];
    }


}
