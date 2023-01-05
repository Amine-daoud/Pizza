<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pizza;
use Illuminate\Auth\Access\HandlesAuthorization;

class PizzaPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Pizza $pizza)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Pizza $pizza)
    {
        return $user->id == $pizza->uid;
    }

    public function delete(User $user,Pizza $pizza)
    {
        return $user->isAdmin() || $user->id == $pizza->uid;
    }
}

