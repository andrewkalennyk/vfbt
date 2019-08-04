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


class House extends Model
{
    use RevisionMaker;

    protected $table = 'houses';

    protected $fillable = [
        'street_id',
        'elective_plot_id',
        'title'
        'entrances_number',
        'floors_number',
        'flat_number',
    ];

    protected $transcript = [
        'fields' => [
            'id' => 'ID',
            'title' => 'Назва',
            'entrances_number' => "кількість під'їздів",
            'floors_number' => 'кількість поверхів',
            'flat_number' => 'кількість квартир',
            'street_id' => 'ID Вулиці',
            'elective_plot_id' => 'ID Дільниці',
        ],
        'name' => 'Будинки',
        'slug' => 'houses'
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
