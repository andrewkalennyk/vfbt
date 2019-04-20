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
        'street_id',
        'title'
    ];

    public function street()
    {
       return $this->belongsTo('App\Models\Street');
    }

    public function citizens()
    {
        return $this->belongsToMany('App\Models\Citizen','houses_citizens')->withPivot('citizen_status_id');
    }

    public function house_citizens()
    {
        return $this->hasMany('App\Models\HouseCitizen');
    }

    public function elective_plot()
    {
        return $this->belongsTo('App\Models\ElectivePlot');
    }
}