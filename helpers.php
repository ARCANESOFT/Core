<?php

use Arcanesoft\Core\Helpers\UI\Label;

/* -----------------------------------------------------------------
 |  Labels
 | -----------------------------------------------------------------
 */

if ( ! function_exists('label_active_icon')) {
    /**
     * Generate active icon label.
     *
     * @param  bool   $active
     * @param  array  $options
     * @param  bool   $withTooltip
     *
     * @return \Illuminate\Support\HtmlString
     */
    function label_active_icon($active, array $options = [], $withTooltip = true) {
        return Label::activeIcon($active, $options, $withTooltip);
    }
}

if ( ! function_exists('label_active_status')) {
    /**
     * Generate active status label.
     *
     * @param  bool   $active
     * @param  array  $options
     *
     * @return \Illuminate\Support\HtmlString
     */
    function label_active_status($active, array $options = []) {
        return Label::activeStatus($active, $options);
    }
}

if ( ! function_exists('label_count')) {
    /**
     * Generate count label.
     *
     * @param  int|float  $count
     * @param  array      $options
     *
     * @return Illuminate\Support\HtmlString
     */
    function label_count($count, array $options = []) {
        return Label::count($count, $options);
    }
}

if ( ! function_exists('label_locked_icon')) {
    /**
     * Generate locked icon label.
     *
     * @param  bool   $locked
     * @param  array  $options
     * @param  bool   $withTooltip
     *
     * @return \Illuminate\Support\HtmlString
     */
    function label_locked_icon($locked, array $options = [], $withTooltip = true) {
        return Label::lockedIcon($locked, $options, $withTooltip);
    }
}

if ( ! function_exists('label_locked_status')) {
    /**
     * Generate locked status label.
     *
     * @param  bool   $locked
     * @param  array  $options
     * @param  bool   $withIcon
     *
     * @return \Illuminate\Support\HtmlString
     */
    function label_locked_status($locked, array $options = [], $withIcon = true) {
        return Label::lockedStatus($locked, $options, $withIcon);
    }
}

if ( ! function_exists('label_trashed_status')) {
    /**
     * Generate trashed status label.
     *
     * @param  array  $options
     * @param  bool   $withIcon
     *
     * @return \Illuminate\Support\HtmlString
     */
    function label_trashed_status(array $options = [], $withIcon = true) {
        return Label::trashedStatus($options, $withIcon);
    }
}

