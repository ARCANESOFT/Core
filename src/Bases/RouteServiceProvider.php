<?php namespace Arcanesoft\Core\Bases;

use Arcanedev\Support\Providers\RouteServiceProvider as ServiceProvider;
use Closure;
use Illuminate\Support\Arr;

/**
 * Class     RouteServiceProvider
 *
 * @package  Arcanesoft\Support\Providers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class RouteServiceProvider extends ServiceProvider
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * The admin controller namespace for the application.
     *
     * @var string|null
     */
    protected $adminNamespace;

    /* -----------------------------------------------------------------
     |  Getters & Setters
     | -----------------------------------------------------------------
     */

    /**
     * Get the config repository instance.
     *
     * @return \Illuminate\Contracts\Config\Repository
     */
    protected function config()
    {
        return $this->app['config'];
    }

    /**
     * Get the admin route attributes.
     *
     * @return array
     */
    protected function getAdminAttributes()
    {
        return $this->config()->get('arcanesoft.core.admin', []);
    }

    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Group the routes with admin attributes.
     *
     * @param  \Closure  $callback
     */
    protected function adminGroup(Closure $callback)
    {
        $attributes = $this->getAdminAttributes();

        $this->prefix(Arr::get($attributes, 'prefix', 'dashboard'))
             ->name(Arr::get($attributes, 'name', 'admin::'))
             ->namespace($this->adminNamespace)
             ->middleware(Arr::get($attributes, 'middleware', ['web', 'auth', 'admin']))
             ->group($callback);
    }
}
