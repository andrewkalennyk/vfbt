<?php

namespace app;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function isSuperAdmin()
    {
        return !empty($this->user_role) ? $this->user_role->is_super_group : false;
    }

    public function isCoordinator()
    {
        return $this->user_role->type === 'coordinator' ? true : false;
    }

    public function isWorker()
    {
        return $this->user_role->type === 'worker' ? true : false;
    }

    public function getCoordinatorsOfficeId()
    {
        return $this->user_role->office ? $this->user_role->office->id  : false;
    }
}
