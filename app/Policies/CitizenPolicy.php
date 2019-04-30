<?php

namespace App\Policies;

use App\Models\Citizen;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CitizenPolicy extends OfficePolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return true;
    }

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, $model)
    {
        return true;
    }

}
