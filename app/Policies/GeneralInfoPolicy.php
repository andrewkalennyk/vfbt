<?php

namespace App\Policies;

use App\Models\Promotion;
use App\User;
use App\Models\GeneralInfoCitizen;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class GeneralInfoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the general info citizen.
     *
     * @param  \App\User  $user
     * @param  \App\GeneralInfoCitizen  $generalInfoCitizen
     * @return mixed
     */
    public function view(User $user, GeneralInfoCitizen $generalInfoCitizen)
    {
        if ($user->isSuperAdmin() || $user->isCoordinator()) {
            return true;
        }
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
     * Determine whether the user can create general info citizens.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the general info citizen.
     *
     * @param  \App\User  $user
     * @param  \App\GeneralInfoCitizen  $generalInfoCitizen
     * @return mixed
     */
    public function update(User $user, GeneralInfoCitizen $generalInfoCitizen)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the general info citizen.
     *
     * @param  \App\User  $user
     * @param  \App\GeneralInfoCitizen  $generalInfoCitizen
     * @return mixed
     */
    public function delete(User $user, GeneralInfoCitizen $generalInfoCitizen)
    {
        return false;
    }

    public function attachPromotion(User $user, GeneralInfoCitizen $generalInfoCitizen, Promotion $promotion)
    {
        return false;
    }

    public function detachPromotion(User $user, GeneralInfoCitizen $generalInfoCitizen, Promotion $promotion)
    {
        return false;
    }
}
