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


class HouseCitizen extends Model
{
    use RevisionMaker;

    protected $table = 'houses_citizens';

    protected $fillable = [
        'house_id',
        'citizen_id',
        'citizen_status_id',
        'flat_number'
    ];

    protected $transcript = [
        'fields' => [
            'id' => 'ID',
            'house_id' => 'id Дому',
            'citizen_id' => 'id Громадянина',
            'citizen_status_id' => 'Статус',
            'flat_number' => 'Квартира',
        ],
        'name' => 'Привязка громадянина до дому',
        'slug' => 'houses-citizens'
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

    public function getStatus()
    {
        return $this->citizen_status ? $this->citizen_status->title : '';
    }

}