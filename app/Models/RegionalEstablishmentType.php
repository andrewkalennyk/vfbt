<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use App\Traits\RevisionMaker;
use Illuminate\Database\Eloquent\Model;


class RegionalEstablishmentType extends Model
{
    use RevisionMaker;

    protected $table = 'regional_establishment_types';

    protected $fillable = [
        'title'
    ];

    protected $transcript = [
        'fields' => [
            'id' => 'ID',
            'title' => 'Назва',
        ],
        'name' => 'Тип Районного закладу',
        'slug' => 'regional-establishment-types'
    ];


    public function regionalEstablishments()
    {
        return $this->hasMany('App\Models\RegionalEstablishment');
    }

}