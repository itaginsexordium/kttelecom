<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Task;
use App\Models\User;
use App\Observers\TagObserver;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Company::observe(TagObserver::class);
        Task::observe(TagObserver::class);
        app()->setLocale('ru');
        Gate::before(function (User $user, string $ability) {
            return $user->isSuperAdmin() ? true: null;
        });
    }
}
