<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register other services if needed
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {


        Gate::define('admin-only', function (User $user) {
            return $user->isAdmin();
        });
    }
}
