<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CitizenCitizenStatus extends Model
{

    protected $table = 'citizen_citizen_statuses';

    protected $fillable = [
        'citizen_id',
        'citizens_status_id',
        'citizens_sub_status_id',
    ];


    public function citizen()
    {
        return $this->BelongsTo('App\Models\Citizen');
    }

    public function citizen_status()
    {
        return $this->BelongsTo('App\Models\CitizensStatus');
    }

    public function citizen_sub_status()
    {
        return $this->BelongsTo('App\Models\CitizensSubStatus');
    }

}