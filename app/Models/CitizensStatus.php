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


class CitizensStatus extends Model
{
    use RevisionMaker;

    protected $table = 'citizens_statuses';

    protected $fillable = [
        'title'
    ];

    protected $transcript = [
        'fields' => [
            'id' => 'ID',
            'title' => 'Назва',
        ],
        'name' => 'Статус громадянина',
        'slug' => 'citizens-statuses'
    ];

    public function citizen_sub_statuses()
    {
        return $this->hasMany('App\Models\CitizensSubStatus');
    }

}