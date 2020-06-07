<?php

namespace App\Policies;

use App\User;
use App\ElectivePlot;
use Illuminate\Auth\Access\HandlesAuthorization;

class ElectivePlotPolicy extends OfficePolicy
{

    public function create(User $user)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    public function delete(User $user, $model)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    public function update(User $user, $model)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }
}
