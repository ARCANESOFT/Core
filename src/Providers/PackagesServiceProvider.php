<?php namespace Arcanesoft\Core\Providers;

use Arcanedev\Support\ServiceProvider;

/**
 * Class     PackagesServiceProvider
 *
 * @package  Arcanesoft\Core\Providers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class PackagesServiceProvider extends ServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerSettingsPackage();
        $this->registerSeoHelperPackage();
        $this->registerBreadcrumbsPackage();
    }

    /* ------------------------------------------------------------------------------------------------
     |  Packages
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register the Settings Package.
     */
    private function registerSettingsPackage()
    {
        $this->app->register(\Arcanedev\Settings\SettingsServiceProvider::class);
        $this->alias('Setting', \Arcanedev\Settings\Facades\Setting::class);
    }

    /**
     * Register SEO Helper Package.
     */
    private function registerSeoHelperPackage()
    {
        $this->app->register(\Arcanedev\SeoHelper\SeoHelperServiceProvider::class);
        $this->alias('SeoHelper', \Arcanedev\SeoHelper\Facades\SeoHelper::class);
    }

    /**
     * Register the Breadcrumbs Package.
     */
    private function registerBreadcrumbsPackage()
    {
        $this->app->register(\Arcanedev\Breadcrumbs\BreadcrumbsServiceProvider::class);
        $this->alias('Breadcrumbs', \Arcanedev\Breadcrumbs\Facades\Breadcrumbs::class);
    }
}
