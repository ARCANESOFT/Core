<?php namespace Arcanesoft\Core\Providers;

use Arcanedev\Breadcrumbs;
use Arcanedev\Hasher;
use Arcanedev\LaravelHtml;
use Arcanedev\Notify;
use Arcanedev\SeoHelper;
use Arcanesoft\Settings;
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
     * {@inheritdoc}
     */
    public function register()
    {
        $this->registerBreadcrumbsPackage();
        $this->registerHasherPackage();
        $this->registerLaravelHtmlPackage();
        $this->registerNotifyPackage();
        $this->registerSeoHelperPackage();
        $this->registerSettingsPackage();

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
        $this->registerProvider(Settings\SettingsServiceProvider::class);
        $this->alias('Settings', Settings\Facades\Settings::class);
    }

    /**
     * Register the Hasher Package.
     */
    private function registerHasherPackage()
    {
        $this->registerProvider(Hasher\HasherServiceProvider::class);
        $this->alias('Hasher', Hasher\Facades\Hasher::class);
    }

    /**
     * Register the Laravel Html Package
     */
    private function registerLaravelHtmlPackage()
    {
        $this->registerProvider(LaravelHtml\HtmlServiceProvider::class);
        $this->alias('Html', LaravelHtml\Facades\Html::class);
        $this->alias('Form', LaravelHtml\Facades\Form::class);
    }

    /**
     * Register SEO Helper Package.
     */
    private function registerSeoHelperPackage()
    {
        $this->registerProvider(SeoHelper\SeoHelperServiceProvider::class);
        $this->alias('SeoHelper', SeoHelper\Facades\SeoHelper::class);
    }

    /**
     * Register the Breadcrumbs Package.
     */
    private function registerBreadcrumbsPackage()
    {
        $this->registerProvider(Breadcrumbs\BreadcrumbsServiceProvider::class);
        $this->alias('Breadcrumbs', Breadcrumbs\Facades\Breadcrumbs::class);
    }

    /**
     * Register the Notify Package.
     */
    private function registerNotifyPackage()
    {
        $this->registerProvider(Notify\NotifyServiceProvider::class);
        $this->alias('Notify', Notify\Facades\Notify::class);
    }
}
