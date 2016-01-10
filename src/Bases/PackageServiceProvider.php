<?php namespace Arcanesoft\Core\Bases;

use Arcanedev\Support\PackageServiceProvider as ServiceProvider;

/**
 * Class     PackageServiceProvider
 *
 * @package  Arcanesoft\Core\Bases
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class PackageServiceProvider extends ServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Vendor name.
     *
     * @var string
     */
    protected $vendor       = 'arcanesoft';

    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get config key.
     *
     * @return string
     */
    protected function getConfigKey()
    {
        return str_slug($this->vendor . ' ' .$this->package, '.');
    }

    /* ------------------------------------------------------------------------------------------------
     |  Sidebar Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the sidebar folder.
     *
     * @return string
     */
    protected function getSidebarFolder()
    {
        return $this->getConfigFolder() . DS . 'sidebar' . DS . $this->package;
    }

    /**
     * Get the sidebar config key.
     *
     * @return string
     */
    protected function getSidebarKey()
    {
        return "$this->vendor.sidebar.$this->package";
    }

    /**
     * Register all the sidebar config files.
     */
    protected function registerSidebarItems()
    {
        $paths = $this->filesystem()->glob($this->getSidebarFolder() . DS . '*.php');

        foreach ($paths as $path) {
            $this->mergeConfigFrom($path, $this->getSidebarKey() . '.' . basename($path, '.php'));
        }
    }

    /**
     * Publish all the sidebar config files.
     */
    protected function publishSidebarItems()
    {
        $this->publishes([
            $this->getSidebarFolder() => config_path($this->vendor . DS . 'sidebar' . DS . $this->package)
        ], 'sidebar');
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

    /**
     * Get the filesystem instance.
     *
     * @return \Illuminate\Filesystem\Filesystem
     */
    protected function filesystem()
    {
        return $this->app['files'];
    }
}
