<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 4/29/19
 * Time: 9:14 AM
 */

namespace App\Models;


use App\Traits\RevisionMaker;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use RevisionMaker;

    protected $table = 'user_roles';

    protected $fillable = [
        'title', 'is_super_group'
    ];

    protected $transcript = [
        'fields' => [
            'id' => 'ID',
            'title' => 'Назва',
            'office_id' => 'ID приймальні',
        ],
        'name' => 'Группи',
        'slug' => 'user-roles'
    ];

    public function office()
    {
        return $this->belongsTo('App\Models\Office');
    }
}