<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\SearchCache;
use App\Models\User;

class SearchCachePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any SearchCache');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SearchCache $searchcache): bool
    {
        return $user->checkPermissionTo('view SearchCache');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create SearchCache');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SearchCache $searchcache): bool
    {
        return $user->checkPermissionTo('update SearchCache');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SearchCache $searchcache): bool
    {
        return $user->checkPermissionTo('delete SearchCache');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SearchCache $searchcache): bool
    {
        return $user->checkPermissionTo('restore SearchCache');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SearchCache $searchcache): bool
    {
        return $user->checkPermissionTo('force-delete SearchCache');
    }
}
