<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\CompanyList;
use App\Models\User;

class CompanyListPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any CompanyList');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CompanyList $companylist): bool
    {
        return $user->checkPermissionTo('view CompanyList');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create CompanyList');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CompanyList $companylist): bool
    {
        return $user->checkPermissionTo('update CompanyList');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CompanyList $companylist): bool
    {
        return $user->checkPermissionTo('delete CompanyList');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CompanyList $companylist): bool
    {
        return $user->checkPermissionTo('restore CompanyList');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CompanyList $companylist): bool
    {
        return $user->checkPermissionTo('force-delete CompanyList');
    }
}
