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
        'title','date_birth'
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

    /*public function house()
    {
        return $this->belongsToMany('App\Models\Citizen','citizens_promotions');
    }*/

}