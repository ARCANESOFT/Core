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
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get admin attributes.
     *
     * @todo: Refactor this code with a method like `adminGroup()`
     *
     * @param  string  $name
     * @param  string  $namespace
     * @param  string  $uri
     * @param  array   $middleware
     *
     * @return array
     */
    protected function getAdminAttributes($name, $namespace, $uri = '', array $middleware = [])
    {
        return [
            'as'         => $this->prependAdminRouteName($name),
            'namespace'  => $namespace,
            'prefix'     => $this->prependAdminPrefixUri($uri),
            'middleware' => $this->getAdminMiddleware($middleware),
        ];
    }

    /**
     * Prepend admin route name.
     *
     * @param  string  $name
     *
     * @return string
     */
    protected function prependAdminRouteName($name)
    {
        return $this->config()->get('arcanesoft.core.admin.route', 'admin::') . $name;
    }

    /**
     * Prepend admin uri.
     *
     * @param  string  $uri
     *
     * @return string
     */
    protected function prependAdminPrefixUri($uri = '')
    {
        $prefix = $this->config()->get('arcanesoft.core.admin.prefix', 'dashboard');

        return trim("{$prefix}/{$uri}", '/');
    }

    /**
     * Get the admin middleware.
     *
     * @param  array  $append
     *
     * @return array|mixed
     */
    protected function getAdminMiddleware(array $append = [])
    {
        $middleware = $this->config()->get('arcanesoft.core.admin.middleware', []);

        foreach ($append as $extra) {
            if ( ! in_array($extra, $middleware)) $middleware[] = $extra;
        }

        return $middleware;
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
