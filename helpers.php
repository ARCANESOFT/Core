<?php

if ( ! function_exists('notification')) {
    /**
     * Get the notifications helper.
     *
     * @return \Arcanesoft\Core\Helpers\Notification
     */
    function notification() {
        return app('arcanesoft.helpers.notification');
    }
}
