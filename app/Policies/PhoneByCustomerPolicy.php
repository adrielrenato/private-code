<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\PhoneByCustomer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhoneByCustomerPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        
    }

    /**
     * Determine whether the user can create the phone by customer.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isOwner();
    }

    /**
     * Determine whether the user can update the phone by customer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PhoneByCustomer  $phoneByCustomer
     * @return mixed
     */
    public function update(User $user, PhoneByCustomer $phoneByCustomer)
    {
        return $user->isOwner() || $user->group->hasPermission(Permission::UPDATE_OR_DELETE_PHONES);
    }

    /**
     * Determine whether the user can delete the group.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PhoneByCustomer  $phoneByCustomer
     * @return mixed
     */
    public function delete(User $user, PhoneByCustomer $phoneByCustomer)
    {
        return $user->isOwner() || $user->group->hasPermission(Permission::UPDATE_OR_DELETE_PHONES);
    }
}
