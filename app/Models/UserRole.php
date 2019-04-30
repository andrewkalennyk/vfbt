<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 4/29/19
 * Time: 9:14 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_roles';

    protected $fillable = [
        'title', 'is_super_group'
    ];

    public function office()
    {
        return $this->belongsTo('App\Models\Office');
    }
}