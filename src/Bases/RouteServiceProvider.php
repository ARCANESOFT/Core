<?php namespace Arcanesoft\Core\Bases;

use Arcanedev\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Arr;

/**
 * Class     RouteServiceProvider
 *
 * @package  Arcanesoft\Support\Providers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @todo: Remove deprecated functions
 */
abstract class RouteServiceProvider extends ServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get Foundation route group.
     *
     * @return array
     */
    protected function getAdminRouteGroup()
    {
        return $this->config()->get('arcanesoft.foundation.route', []);
    }

    /**
     * Get Foundation route prefix.
     *
     * @return string
     */
    protected function getAdminPrefix()
    {
        return Arr::get($this->getAdminRouteGroup(), 'prefix', 'dashboard');
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
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

    /* ------------------------------------------------------------------------------------------------
     |  Deprecated Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get Foundation route group.
     *
     * @deprecated
     *
     * @return array
     */
    protected function getFoundationRouteGroup()
    {
        return $this->getAdminRouteGroup();
    }

    /**
     * Get Foundation route prefix.
     *
     * @deprecated
     *
     * @return string
     */
    protected function getFoundationPrefix()
    {
        return $this->getAdminPrefix();
    }
}
