<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Tarif;
use App\Models\User;

class TarifPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Tarif');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Tarif $tarif): bool
    {
        return $user->checkPermissionTo('view Tarif');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Tarif');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Tarif $tarif): bool
    {
        return $user->checkPermissionTo('update Tarif');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Tarif $tarif): bool
    {
        return $user->checkPermissionTo('delete Tarif');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Tarif $tarif): bool
    {
        return $user->checkPermissionTo('restore Tarif');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Tarif $tarif): bool
    {
        return $user->checkPermissionTo('force-delete Tarif');
    }
}
