<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Access\Response;

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
        Gate::define('admin-dashboard', function (User $user) {
            return $user->role_id == 3
                ? Response::allow()
                : Response::denyAsNotFound();
        });

        Gate::define('manager-dashboard', function (User $user) {
            return $user->role_id == 2
                ? Response::allow()
                : Response::denyAsNotFound();
        });
    }
}
