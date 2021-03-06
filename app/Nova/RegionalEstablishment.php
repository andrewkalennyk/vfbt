<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use NovaAjaxSelect\AjaxSelect;
use Dniccum\PhoneNumber\PhoneNumber;
use Benjacho\BelongsToManyField\BelongsToManyField;

class RegionalEstablishment extends HandBookResource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\RegionalEstablishment';

    public static function label()
    {
        return 'Заклад';
    }

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make(__('Тип'), 'regionalEstablishmentType', 'App\Nova\RegionalEstablishmentType'),

            Text::make(__('Номер/назва'),'title')
                ->sortable()
                ->rules('required', 'max:255'),

            BelongsTo::make(__('Вулиця'), 'street', 'App\Nova\Street'),

            BelongsTo::make(__('Будинок'), 'house', 'App\Nova\House')->exceptOnForms(),

            AjaxSelect::make(__('Будинок'), 'house_id')
                ->get('/get-houses-by-street/{street}')
                ->parent('street'),

            Text::make(__('керівник'),'chief')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make(__('Телефони'),'phone_index')->exceptOnForms()->asHtml(),

            PhoneNumber::make(__('Телефон'), 'phone')
                ->sortable()
                ->format('+380' . '##-###-##-##')
                ->disableValidation(true)
                ->onlyOnForms()
                ->placeholder('+380__-___-__-__'),

            PhoneNumber::make(__('Телефон (дод 1)'), 'phone_second')
                ->sortable()
                ->format('+380' . '##-###-##-##')
                ->disableValidation(true)
                ->onlyOnForms()
                ->placeholder('+380__-___-__-__'),

            PhoneNumber::make(__('Телефон (дод 2)'), 'phone_third')
                ->sortable()
                ->format('+380' . '##-###-##-##')
                ->disableValidation(true)
                ->onlyOnForms()
                ->placeholder('+380__-___-__-__'),

            Textarea::make(__('Лояльність до нас'), 'loyalty')->alwaysShow(),

            BelongsToMany::make(__('Громадяни'), 'citizens', 'App\Nova\Citizen'),

            BelongsToManyField::make(__('Будинки'), 'houses', 'App\Nova\House')
                ->options(\App\Models\House::where('street_id',$this->street_id)->get())
                ->optionsLabel('title')
                ->showOnUpdating()


           // BelongsToMany::make(__('Будинки'), 'houses', 'App\Nova\House')

        ];
    }
}
