<?php namespace Arcanesoft\Core\Bases;

use Arcanedev\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * Class     RouteServiceProvider
 *
 * @package  Arcanesoft\Support\Providers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
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
    protected function getFoundationRouteGroup()
    {
        return $this->config()->get('arcanesoft.foundation.route', []);
    }

    /**
     * Get Foundation route prefix.
     *
     * @return string
     */
    protected function getFoundationPrefix()
    {
        return array_get($this->getFoundationRouteGroup(), 'prefix', 'dashboard');
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
}
