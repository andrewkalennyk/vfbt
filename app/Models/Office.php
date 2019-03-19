<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Office extends Model
{
    protected $table = 'offices';

    protected $fillable = [
        'title'
    ];

    public function elective_plots()
    {
        return $this->hasMany('App\Models\ElectivePlot');
    }
}