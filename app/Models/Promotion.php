<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Promotion extends Model
{
    protected $table = 'promotions';

    protected $fillable = [
        'title','start_date','finish_date'
    ];

    protected $casts = [
        'start_date' => 'date',
        'finish_date' => 'date',
    ];


    /*public function citizens()
    {
        return $this->belongsToMany('App\Models\Citizen','citizens_promotions');
    }*/
}