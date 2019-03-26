<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class HouseCitizen extends Model
{
    protected $table = 'houses_citizens';

    protected $fillable = [
        'house_id','citizen_id','citizen_status_id'
    ];

    public function citizen()
    {
        return $this->BelongsTo('App\Models\Citizen');
    }

    public function house()
    {
        return $this->BelongsTo('App\Models\House');
    }

    public function citizen_status()
    {
        return $this->BelongsTo('App\Models\CitizensStatus');
    }

}