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


class Street extends BaseClass
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

    protected $savingElectivePlots = [];

    /*public function elective_plot()
    {
       return $this->belongsTo('App\Models\ElectivePlot');
    }*/

    public function electivePlots()
    {
        return $this->belongsToMany(ElectivePlot::class,
            'elective_plots_streets',
            'street_id',
            'elective_plot_id'
            );
    }

    public function houses()
    {
        return $this->hasMany('App\Models\House');
    }

    public function scopeFilter($query, $filters)
    {
       if (Arr::get($filters,'house_id')) {
           /*$ids = House::find(Arr::get($filters,'house_id'));
           $query = $query->where();*/
       }

       $electivePlot = Arr::get($filters, 'elective_plot_id');
        if ($electivePlot) {
            $query = $query->whereHas('electivePlots', function ($subQuery) use ($electivePlot) {
                return $subQuery->where('elective_plot_id', $electivePlot);
            });
        }
       return $query;
    }

    public function scopeByElectivePlot($query, $id)
    {
        return $query->where('elective_plot_id', $id);
    }

    public function getElectivePlotListAttribute()
    {
        return !empty($this->electivePlots) ? $this->electivePlots->pluck('id')->all() : collect([]);
    }

    public function setElectivePlotListAttribute($value)
    {
        $this->savingElectivePlots = explode(",", $value);

    }

    public function getIndexElectivePlotsAttribute()
    {
        return $this->electivePlots->pluck('title')->implode(',<br>');
    }

    public function getHouseCountAttribute()
    {
        return $this->houses->count();
    }

    protected static function boot()
    {
        parent::boot();

        static::created( function ($object) {
            $object->electivePlots()->sync($object->savingElectivePlots);
        });

        static::saved(function ($object) {
            $object->electivePlots()->sync($object->savingElectivePlots);
        });

    }
}