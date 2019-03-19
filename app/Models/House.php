<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class House extends Model
{
    protected $table = 'houses';

    protected $fillable = [
        'title'
    ];

    public function street()
    {
       return $this->belongsTo('App\Models\Street');
    }

    public function citizens()
    {
        return $this->belongsToMany('App\Models\Citizen','house_citizens')->withPivot('is_responsible');
    }
}