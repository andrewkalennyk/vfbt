<?php

namespace App\Policies;

use App\User;
use App\Revision;
use Illuminate\Auth\Access\HandlesAuthorization;

class RevisionPolicy extends Policy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can create revisions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the revision.
     *
     * @param  \App\User  $user
     * @param  \App\Revision  $revision
     * @return mixed
     */
    public function update(User $user, $revision)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the revision.
     *
     * @param  \App\User  $user
     * @param  \App\Revision  $revision
     * @return mixed
     */
    public function delete(User $user, $revision)
    {
        return false;
    }

}
