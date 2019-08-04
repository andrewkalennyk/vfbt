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


class CitizensSubStatus extends Model
{
    use RevisionMaker;

    protected $table = 'citizens_sub_statuses';

    protected $fillable = [
        'title',
        'citizen_status_id'
    ];

    protected $transcript = [
        'fields' => [
            'id' => 'ID',
            'title' => 'Назва',
        ],
        'name' => 'Статус громадянина (2 рівень)',
        'slug' => 'citizens-statuses'
    ];

}