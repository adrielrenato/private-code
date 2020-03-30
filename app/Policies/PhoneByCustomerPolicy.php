<?php

namespace App\Policies;

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
     * Determine whether the user can update the phone by customer.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PhoneByCustomer  $phoneByCustomer
     * @return mixed
     */
    public function update(User $user, PhoneByCustomer $phoneByCustomer)
    {
        return $user->isOwner();
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
        return $user->isOwner();
    }
}
