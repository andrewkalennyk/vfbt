<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ElectivePlot extends Model
{
    protected $table = 'elective_plots';

    protected $fillable = [
        'title'
    ];

    public function office()
    {
       return $this->belongsTo('App\Models\Office');
    }

    public function streets()
    {
        return $this->hasMany('App\Models\Street');
    }
}