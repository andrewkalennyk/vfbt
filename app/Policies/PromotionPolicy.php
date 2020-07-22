<?php

namespace App\Policies;

use App\Models\Citizen;
use App\Models\Promotion;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PromotionPolicy extends OfficePolicy
{

    public function view(User $user, $model)
    {
        if ($user->isSuperAdmin() || $user->isCoordinator()) {
            return true;
        }
    }

    public function update(User $user, $model)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    public function attachCitizen(User $user, Promotion $promotion, Citizen $citizen)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    public function detachCitizen(User $user, Promotion $promotion, Citizen $citizen)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }
}
