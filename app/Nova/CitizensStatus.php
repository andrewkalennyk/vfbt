<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class CitizensStatus extends HandBookResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\CitizensStatus';

    public static $displayInNavigation = true;

    public static function label()
    {
        return 'Статус гражд.';
    }
}
