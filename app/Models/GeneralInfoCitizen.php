<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class GeneralInfoCitizen extends Model
{
    protected $table = 'general_info_citizens';

    protected $fillable = [
        'office_id','elective_plot_id','street_id','house_id','citizen_id','flat_number','house_citizen_id'
    ];

    public function office()
    {
        return $this->belongsTo('App\Models\Office');
    }

    public function elective_plot()
    {
        return $this->belongsTo('App\Models\ElectivePlot');
    }

    public function street()
    {
       return $this->belongsTo('App\Models\Street');
    }

    public function house()
    {
        return $this->BelongsTo('App\Models\House');
    }

    public function citizen()
    {
        return $this->BelongsTo('App\Models\Citizen');
    }

}