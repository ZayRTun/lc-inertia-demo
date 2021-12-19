<?php
namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->email === 'zay.t@hotmail.com';
    }

    public function edit(User $user, User $otherUser)
    {
        return (bool) mt_rand(0, 1);
    }
}
