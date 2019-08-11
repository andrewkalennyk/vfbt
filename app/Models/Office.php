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


class Office extends Model
{
    use RevisionMaker;

    protected $table = 'offices';

    protected $fillable = [
        'title'
    ];

    protected $transcript = [
        'fields' => [
            'id' => 'ID',
            'title' => 'Назва',
            'number' => 'Номер',
            'address' => 'Адреса',
        ],
        'name' => 'Громадська приймальня',
        'slug' => 'offices'
    ];

    public function elective_plots()
    {
        return $this->hasMany('App\Models\ElectivePlot');
    }

    public function scopeFilter($query, $filters)
    {

        if (Arr::get($filters, 'elective_plot_id')) {
            $officeId = ElectivePlot::where('id', Arr::get($filters, 'elective_plot_id'))->pluck('office_id');
            $query = $query->whereIn('id', $officeId);
        }
        /*if (Arr::get($filters, 'elective_plot_id')) {
            $officeId = ElectivePlot::where('id', Arr::get($filters, 'elective_plot_id'))->pluck('office_id');
            $query = $query->whereIn('id', $officeId);
        }*/
        return $query;
    }
}