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
use Illuminate\Support\Arr;


class ElectivePlot extends BaseClass
{

    use RevisionMaker;


    protected $table = 'elective_plots';

    protected $fillable = [
        'title', 'created_at', 'updated_at'
    ];

    protected $transcript = [
        'fields' => [
            'id' => 'ID',
            'title' => 'Назва',
            'office_id' => 'ID Приймальної комісії',
        ],
        'name' => 'Дільниці',
        'slug' => 'elective-plots'
    ];

    public function office()
    {
       return $this->belongsTo('App\Models\Office');
    }

    public function streets()
    {
        return $this->hasMany('App\Models\Street');
    }

    public function houses()
    {
        return $this->hasMany('App\Models\House');
    }

    public function scopeFilter($query, $filters)
    {

        if (Arr::get($filters, 'office_id')) {
            $query = $query->where('office_id', Arr::get($filters, 'office_id'));
        }
        return $query;
    }
}