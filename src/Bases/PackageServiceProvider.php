<?php namespace Arcanesoft\Core\Bases;

use Arcanedev\Support\PackageServiceProvider as ServiceProvider;
use Illuminate\Support\Str;

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
    protected $vendor = 'arcanesoft';

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
        return Str::slug("{$this->vendor} {$this->package}", '.');
    }

    /**
     * Get the sidebar folder.
     *
     * @return string
     */
    protected function getSidebarFolder()
    {
        return $this->getConfigFolder().DS.'sidebar';
    }

    /**
     * Get the sidebar config key.
     *
     * @return string
     */
    protected function getSidebarKey()
    {
        return "{$this->vendor}.sidebar.{$this->package}";
    }

    /* ------------------------------------------------------------------------------------------------
     |  Package Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Publish all the package files.
     *
     * @param  bool  $load
     */
    protected function publishAll($load = true)
    {
        parent::publishAll($load);

        $this->publishSidebarItems();
    }

    /**
     * Publish the config file.
     */
    protected function publishConfig()
    {
        $this->publishes([
            $this->getConfigFile() => config_path("{$this->vendor}/{$this->package}.php"),
        ], 'config');
    }

    /**
     * Publish all the sidebar config files.
     */
    protected function publishSidebarItems()
    {
        $this->publishes([
            $this->getSidebarFolder() => config_path($this->vendor.DS.'sidebar'.DS.$this->package)
        ], 'sidebar');
    }

    /**
     * Register all the sidebar config files.
     */
    protected function registerSidebarItems()
    {
        foreach ($this->filesystem()->glob($this->getSidebarFolder().DS.'*.php') as $path) {
            $this->mergeConfigFrom($path, $this->getSidebarKey().'.'.basename($path, '.php'));
        }
    }
}
