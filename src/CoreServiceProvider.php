<?php namespace Arcanesoft\Core;

use Arcanesoft\Core\Bases\PackageServiceProvider;

/**
 * Class     FoundationServiceProvider
 *
 * @package  Arcanesoft\Foundation
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CoreServiceProvider extends PackageServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Package name.
     *
     * @var string
     */
    protected $package      = 'core';

    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the base path of the package.
     *
     * @return string
     */
    public function getBasePath()
    {
        return dirname(__DIR__);
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerArcanesoftDatabase();
        $this->app->register(Providers\PackagesServiceProvider::class);
    }

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->app->register(Providers\RouteServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            //
        ];
    }

    /* ------------------------------------------------------------------------------------------------
     |  Services Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register Foundation database.
     */
    private function registerArcanesoftDatabase()
    {
        $this->config()->set('database.connections.arcanesoft', [
            'driver'   => 'sqlite',
            'database' => storage_path('app/arcanesoft.sqlite'),
            'prefix'   => '',
        ]);
    }
}
