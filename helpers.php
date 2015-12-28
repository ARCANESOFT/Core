<?php

if ( ! function_exists('sidebar')) {
    /**
     * Get the sidebar helper.
     *
     * @return \Arcanesoft\Core\Helpers\Sidebar\Contracts\Sidebar
     */
    function sidebar() {
        return app(\Arcanesoft\Core\Helpers\Sidebar\Contracts\Sidebar::class);
    }
}
