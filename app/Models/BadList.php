<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 8/3/19
 * Time: 9:23 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BadList extends Model
{
    protected $table = 'bad_lists';

    protected $fillable = [
        'citizen_id',
        'bad_list_reason_id',
        'type'
    ];

    public function bad_list_reason()
    {
        return $this->belongsTo('App\Models\BadListReason');
    }


}