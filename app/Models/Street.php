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


class Street extends Model
{
    use RevisionMaker;

    protected $table = 'streets';

    protected $fillable = [
        'title'
    ];

    protected $transcript = [
        'fields' => [
            'id' => 'ID',
            'title' => 'Назва',
            'elective_plot_id' => 'ID Дільниці комісії',
        ],
        'name' => 'Вулиці',
        'slug' => 'streets'
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