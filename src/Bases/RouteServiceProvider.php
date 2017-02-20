<?php namespace Arcanesoft\Core\Bases;

use Arcanedev\Support\Providers\RouteServiceProvider as ServiceProvider;
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
        return $this->app->make('config');
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
    protected function adminGroup(\Closure $callback)
    {
        $attributes = $this->config()->get('arcanesoft.core.admin', []);

        $this->prefix(Arr::get($attributes, 'prefix', 'dashboard'))
             ->name(Arr::get($attributes, 'name', 'admin::'))
             ->namespace($this->adminNamespace)
             ->middleware(Arr::get($attributes, 'middleware', ['web', 'auth', 'admin']))
             ->group($callback);
    }

    /* -----------------------------------------------------------------
     |  Deprecated Methods
     | -----------------------------------------------------------------
     */
    /**
     * Get admin attributes.
     *
     * @deprecated: Use adminGroup(\Closure $callback) instead
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
     * @deprecated: Use adminGroup(\Closure $callback) instead
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
     * @deprecated: Use adminGroup(\Closure $callback) instead
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
     * @deprecated: Use adminGroup(\Closure $callback) instead
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
}
