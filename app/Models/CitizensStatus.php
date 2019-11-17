<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 2/14/19
 * Time: 7:46 AM
 */

namespace App\Models;

use App\Traits\RevisionMaker;
use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Model;


class CitizensStatus extends BaseClass
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

    public function scopeByType($query, $type)
    {
        return $query->whereType($type);
    }

}