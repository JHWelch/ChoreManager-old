<?php

namespace App\Policies;

use App\User;
use App\Chore;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChorePolicy
{
    use HandlesAuthorization;
    
    public function update(User $user, Chore $chore)
    {
        return $chore->owner_id == $user->id;
    }

}
