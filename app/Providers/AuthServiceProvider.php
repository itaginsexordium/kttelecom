<?php

namespace App\Providers;

use App\Policies\PermissionPolicy;
use App\Policies\RolePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ProvidersAuthServiceProvider;

class AuthServiceProvider extends ProvidersAuthServiceProvider
{

    protected $policies = [
        'Spatie\Permission\Models\Role' => RolePolicy::class,
        'Spatie\Permission\Models\Permission' => PermissionPolicy::class,
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
