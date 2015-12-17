<?php namespace Arcanesoft\Core\Providers;

use Arcanesoft\Core\Bases\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Arcanesoft\Core\Http\Middleware;

/**
 * Class     RouteServiceProvider
 *
 * @package  Arcanesoft\Core\Providers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class RouteServiceProvider extends ServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the routes namespace
     *
     * @return string
     */
    protected function getRouteNamespace()
    {
        return '';
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     */
    public function map(Router $router)
    {
        $this->middleware('admin', Middleware\CheckAdministrators::class);
    }
}
