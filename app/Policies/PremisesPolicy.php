<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Premises;
use App\Models\User;

class PremisesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Premises');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Premises $premises): bool
    {
        return $user->checkPermissionTo('view Premises');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Premises');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Premises $premises): bool
    {
        return $user->checkPermissionTo('update Premises');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Premises $premises): bool
    {
        return $user->checkPermissionTo('delete Premises');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Premises $premises): bool
    {
        return $user->checkPermissionTo('restore Premises');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Premises $premises): bool
    {
        return $user->checkPermissionTo('force-delete Premises');
    }
}
