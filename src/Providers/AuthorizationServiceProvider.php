<?php namespace Arcanesoft\Core\Providers;

use Arcanedev\Support\Providers\AuthorizationServiceProvider as ServiceProvider;
use Arcanesoft\Contracts\Auth\Models\User;
use Illuminate\Support\Facades\Gate;

/**
 * Class     AuthorizationServiceProvider
 *
 * @package  Arcanesoft\Core\Providers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class AuthorizationServiceProvider extends ServiceProvider
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Register any application authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function (User $user, $ability) {
            return $user->isAdmin() ? true : null;
        });
    }
}
