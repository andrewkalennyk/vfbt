<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Citizen extends Model
{
    protected $table = 'citizens';

    protected $fillable = [
        'citizens_category_id',
        'last_name',
        'first_name',
        'patronymic_name',
        'phone',
        'certificate_number',
        'date_birth'
    ];

    protected $casts = [
        'date_birth' => 'date',
    ];

    public function promotions()
    {
        return $this->belongsToMany('App\Models\Promotion','citizens_promotions');
    }

    public function citizens_category()
    {
        return $this->BelongsTo('App\Models\CitizensCategory');
    }

    public function house_citizens()
    {
        return $this->hasOne('App\Models\HouseCitizen');
    }

    public static function importCitizen($item) {
        return Citizen::updateOrCreate(
            [
                'last_name' => $item['prizvishche'],
                'first_name' => $item['imya'],
                'patronymic_name' => $item['po_batkovi'],
                'phone' => $item['telefon']
            ],
            [
                'citizens_category_id' => $item['kat'],
                'certificate_number' => $item['posv'],
                //'date_birth' => $item['prizvishche'],
            ]
        );
    }


    /*public function house()
    {
        return $this->belongsToMany('App\Models\Citizen','citizens_promotions');
    }*/

}