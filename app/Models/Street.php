<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Street extends Model
{
    protected $table = 'streets';

    protected $fillable = [
        'title'
    ];

    public function elective_plot()
    {
       return $this->belongsTo('App\Models\ElectivePlot');
    }

    public function houses()
    {
        return $this->hasMany('App\Models\House');
    }
}