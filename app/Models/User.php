<?php
/**
 * Created by PhpStorm.
 * User: andrewkalennyk
 * Date: 4/20/19
 * Time: 1:37 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\RevisionMaker;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, RevisionMaker, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $transcript = [
        'fields' => [
            'id' => 'ID',
            'name' => 'ПІБ',
            'email' => 'Email',
            'user_role_id' => 'ID Группи',
        ],
        'name' => 'Користувачі',
        'slug' => 'users'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user_role()
    {
        return $this->BelongsTo('App\Models\UserRole');
    }
}