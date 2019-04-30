<?php

namespace App\Policies;

use App\User;
use App\Models\Office;
use Illuminate\Auth\Access\HandlesAuthorization;

class OfficePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the office.
     *
     * @param  \App\User  $user
     * @param  \App\Office  $office
     * @return mixed
     */
    public function view(User $user, $model)
    {
        if ($user->isSuperAdmin() || $user->isCoordinator()) {
            return true;
        }
    }

    /**
     * Determine whether the user can create offices.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can update the office.
     *
     * @param  \App\User  $user
     * @param  \App\Office  $office
     * @return mixed
     */
    public function update(User $user, $model)
    {
        if ($user->isSuperAdmin() || $user->isCoordinator()) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the office.
     *
     * @param  \App\User  $user
     * @param  \App\Office  $office
     * @return mixed
     */
    public function delete(User $user, $model)
    {
        return $user->isSuperAdmin();
    }

    public function viewAny(User $user)
    {
        if ($user->isSuperAdmin() || $user->isCoordinator()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the office.
     *
     * @param  \App\User  $user
     * @param  \App\Office  $office
     * @return mixed
     */
    public function restore(User $user, Office $office)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the office.
     *
     * @param  \App\User  $user
     * @param  \App\Office  $office
     * @return mixed
     */
    public function forceDelete(User $user, Office $office)
    {
        //
    }
}
