<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Clients;
use App\Models\User;

class ClientsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Clients');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Clients $clients): bool
    {
        return $user->checkPermissionTo('view Clients');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Clients');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Clients $clients): bool
    {
        return $user->checkPermissionTo('update Clients');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Clients $clients): bool
    {
        return $user->checkPermissionTo('delete Clients');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Clients $clients): bool
    {
        return $user->checkPermissionTo('restore Clients');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Clients $clients): bool
    {
        return $user->checkPermissionTo('force-delete Clients');
    }
}
