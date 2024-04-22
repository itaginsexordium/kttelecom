<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PaymentTransactions;
use App\Models\User;

class PaymentTransactionsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any PaymentTransactions');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PaymentTransactions $paymenttransactions): bool
    {
        return $user->checkPermissionTo('view PaymentTransactions');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create PaymentTransactions');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PaymentTransactions $paymenttransactions): bool
    {
        return $user->checkPermissionTo('update PaymentTransactions');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PaymentTransactions $paymenttransactions): bool
    {
        return $user->checkPermissionTo('delete PaymentTransactions');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PaymentTransactions $paymenttransactions): bool
    {
        return $user->checkPermissionTo('restore PaymentTransactions');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PaymentTransactions $paymenttransactions): bool
    {
        return $user->checkPermissionTo('force-delete PaymentTransactions');
    }
}
