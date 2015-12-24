<?php namespace Arcanesoft\Core\Providers;

use Arcanedev\Support\ServiceProvider;
use Arcanesoft\Core\Helpers;

/**
 * Class     HelpersServiceProvider
 *
 * @package  Arcanesoft\Foundation\Providers
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class HelpersServiceProvider extends ServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerNotificationHelper();
    }

    /* ------------------------------------------------------------------------------------------------
     |  Register Helpers
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * The notification helper.
     */
    private function registerNotificationHelper()
    {
        $this->singleton('arcanesoft.helpers.notification', function ($app) {
            /** @var  \Illuminate\Session\Store $session */
            $session = $app['session.store'];

            return new Helpers\Notification($session);
        });
    }
}
