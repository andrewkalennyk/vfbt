<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class CitizensSubStatus extends HandBookResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\CitizensSubStatus';

    public static $displayInNavigation = false;

    public static function label()
    {
        return 'Статус громадянина (2 рівень)';
    }
}
