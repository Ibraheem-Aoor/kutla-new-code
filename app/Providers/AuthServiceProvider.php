<?php

namespace App\Providers;

use App\Models\User;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('isSuperAdmin', function (User $user) {
            return $user->roles()->first()->slug == 'super-admin';
        });
        Gate::define('isAdmin', function (User $user) {
            return $user->roles->first()->slug == 'admin';
        });
        Gate::define('isEditor', function (User $user) {
            return $user->roles->first()->slug == 'editor';
        });
        Gate::define('isAccountent', function (User $user) {
            return $user->roles->first()->slug == 'accountent';
        });
        Gate::define('isReporter', function (User $user) {
            return $user->roles->first()->slug == 'reporter';
        });
    }
}
