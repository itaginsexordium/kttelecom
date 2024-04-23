<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Links;
use App\Models\User;

class LinksPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Links');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Links $links): bool
    {
        return $user->checkPermissionTo('view Links');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Links');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Links $links): bool
    {
        return $user->checkPermissionTo('update Links');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Links $links): bool
    {
        return $user->checkPermissionTo('delete Links');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Links $links): bool
    {
        return $user->checkPermissionTo('restore Links');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Links $links): bool
    {
        return $user->checkPermissionTo('force-delete Links');
    }
}
