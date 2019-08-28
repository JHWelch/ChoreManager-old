<?php

namespace App\Policies;

use App\ChoreInstance;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChoreInstancePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the chore instance.
     *
     * @param  \App\User  $user
     * @param  \App\ChoreInstance  $choreInstance
     * @return mixed
     */
    public function update(User $user, ChoreInstance $choreInstance)
    {
        $choreInstance->chore->owner_id = $user->id;
    }
}
