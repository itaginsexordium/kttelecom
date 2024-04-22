<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\RegistrationUser;
use App\Models\User;

class RegistrationUserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any RegistrationUser');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RegistrationUser $registrationuser): bool
    {
        return $user->checkPermissionTo('view RegistrationUser');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create RegistrationUser');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RegistrationUser $registrationuser): bool
    {
        return $user->checkPermissionTo('update RegistrationUser');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RegistrationUser $registrationuser): bool
    {
        return $user->checkPermissionTo('delete RegistrationUser');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RegistrationUser $registrationuser): bool
    {
        return $user->checkPermissionTo('restore RegistrationUser');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RegistrationUser $registrationuser): bool
    {
        return $user->checkPermissionTo('force-delete RegistrationUser');
    }
}
