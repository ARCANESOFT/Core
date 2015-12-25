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
        $this->registerHasherPackage();
        $this->registerSeoHelperPackage();
        $this->registerBreadcrumbsPackage();
        $this->registerNotifyPackage();
        $this->registerAliases();
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
     * Register the Hasher Package.
     */
    private function registerHasherPackage()
    {
        $this->app->register(\Arcanedev\Hasher\HasherServiceProvider::class);
        $this->alias('Hasher', \Arcanedev\Hasher\Facades\Hasher::class);
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

    /**
     * Register the Notify Package.
     */
    private function registerNotifyPackage()
    {
        $this->app->register(\Arcanedev\Notify\NotifyServiceProvider::class);
        $this->alias('Notify', \Arcanedev\Notify\Facades\Notify::class);
    }
}
