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
