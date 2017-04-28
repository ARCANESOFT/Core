<?php namespace Arcanesoft\Core\Providers;

use Arcanedev\Breadcrumbs\BreadcrumbsServiceProvider;
use Arcanedev\Hasher\HasherServiceProvider;
use Arcanedev\LaravelApiHelper\ApiHelperServiceProvider;
use Arcanedev\LaravelHtml\HtmlServiceProvider;
use Arcanedev\SeoHelper\SeoHelperServiceProvider;
use Arcanedev\Support\ServiceProvider;
use Arcanesoft\Settings\SettingsServiceProvider;
use Arcanesoft\Sidebar\SidebarServiceProvider;

/**
 * Class     PackagesServiceProvider
 *
 * @package  Arcanesoft\Core\Providers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class PackagesServiceProvider extends ServiceProvider
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Register the service provider.
     */
    public function register()
    {
        parent::register();

        $this->registerLaravelApiHelperPackage();
        $this->registerBreadcrumbsPackage();
        $this->registerHasherPackage();
        $this->registerLaravelHtmlPackage();
        $this->registerNotifyPackage();
        $this->registerSeoHelperPackage();
        $this->registerSettingsPackage();
        $this->registerSidebarPackage();

        $this->registerAliases();
    }

    /* -----------------------------------------------------------------
     |  Packages
     | -----------------------------------------------------------------
     */

    /**
     * Register the API Helper Package.
     */
    private function registerLaravelApiHelperPackage()
    {
        $this->registerProvider(ApiHelperServiceProvider::class);
    }

    /**
     * Register the Settings Package.
     */
    private function registerSettingsPackage()
    {
        $this->registerProvider(SettingsServiceProvider::class);

        $this->alias('Settings', \Arcanesoft\Settings\Facades\Settings::class);
    }

    /**
     * Register the Hasher Package.
     */
    private function registerHasherPackage()
    {
        $this->registerProvider(HasherServiceProvider::class);

        $this->alias('Hasher', \Arcanedev\Hasher\Facades\Hasher::class);
    }

    /**
     * Register the Laravel Html Package
     */
    private function registerLaravelHtmlPackage()
    {
        $this->registerProvider(HtmlServiceProvider::class);

        $this->alias('Html', \Arcanedev\LaravelHtml\Facades\Html::class);
        $this->alias('Form', \Arcanedev\LaravelHtml\Facades\Form::class);
    }

    /**
     * Register SEO Helper Package.
     */
    private function registerSeoHelperPackage()
    {
        $this->registerProvider(SeoHelperServiceProvider::class);

        $this->alias('SeoHelper', \Arcanedev\SeoHelper\Facades\SeoHelper::class);
    }

    /**
     * Register the Breadcrumbs Package.
     */
    private function registerBreadcrumbsPackage()
    {
        $this->registerProvider(BreadcrumbsServiceProvider::class);

        $this->alias('Breadcrumbs', \Arcanedev\Breadcrumbs\Facades\Breadcrumbs::class);
    }

    /**
     * Register the Notify Package.
     */
    private function registerNotifyPackage()
    {
        $this->registerProvider(\Arcanedev\Notify\NotifyServiceProvider::class);

        $this->alias('Notify', \Arcanedev\Notify\Facades\Notify::class);
    }

    /**
     * Register the Sidebar Package.
     */
    private function registerSidebarPackage()
    {
        $this->registerProvider(SidebarServiceProvider::class);

        $this->alias('Sidebar', \Arcanesoft\Sidebar\Facades\Sidebar::class);
    }
}
