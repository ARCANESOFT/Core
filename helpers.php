<?php

use Arcanesoft\Core\Helpers\UI\Label;
use Arcanesoft\Core\Helpers\UI\Link;

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
     * @param  bool   $withIcon
     *
     * @return \Illuminate\Support\HtmlString
     */
    function label_active_status($active, array $options = [], $withIcon = true) {
        return Label::activeStatus($active, $options, $withIcon);
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

/* -----------------------------------------------------------------
 |  Links
 | -----------------------------------------------------------------
 */

if ( ! function_exists('link_activate_icon')) {
    /**
     * Generate activate icon link.
     *
     * @param  bool    $active
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $withTooltip
     * @param  bool    $disabled
     *
     * @return \Illuminate\Support\HtmlString
     */
    function link_activate_icon($active, $url, array $attributes = [], $withTooltip = true, $disabled = false) {
        return Link::activateIcon($active, $url, $attributes, $withTooltip, $disabled);
    }
}

if ( ! function_exists('link_activate_modal_icon')) {
    /**
     * Generate activate icon link for modals (reverse button based on active state).
     *
     * @param  bool    $active
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $withTooltip
     * @param  bool    $disabled
     *
     * @return \Illuminate\Support\HtmlString
     */
    function link_activate_modal_icon($active, $url, array $attributes = [], $withTooltip = true, $disabled = false) {
        return Link::activateModalIcon($active, $url, $attributes, $withTooltip, $disabled);
    }
}

if ( ! function_exists('link_add_icon')) {
    /**
     * Generate add icon link.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $withTooltip
     * @param  bool    $disabled
     *
     * @return \Illuminate\Support\HtmlString
     */
    function link_add_icon($url, array $attributes = [], $withTooltip = true, $disabled = false) {
        return Link::addIcon($url, $attributes, $withTooltip, $disabled);
    }
}

if ( ! function_exists('link_delete_modal_icon')) {
    /**
     * Generate delete icon link for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $withTooltip
     * @param  bool    $disabled
     *
     * @return \Illuminate\Support\HtmlString
     */
    function link_delete_modal_icon($url, array $attributes = [], $withTooltip = true, $disabled = false) {
        return Link::deleteModalIcon($url, $attributes, $withTooltip, $disabled);
    }
}

if ( ! function_exists('link_delete_modal_with_icon')) {
    /**
     * Generate delete link with icon for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return \Illuminate\Support\HtmlString
     */
    function link_delete_modal_with_icon($url, array $attributes = [], $disabled = false) {
        return Link::deleteModalWithIcon($url, $attributes, $disabled);
    }
}

if ( ! function_exists('link_activate_modal_with_icon')) {
    /**
     * Generate activate link with icon for modals (reverse button based on active state).
     *
     * @param  bool    $active
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return \Illuminate\Support\HtmlString
     */
    function link_activate_modal_with_icon($active, $url, array $attributes = [], $disabled = false) {
        return Link::activateModalWithIcon($active, $url, $attributes, $disabled);
    }
}

if ( ! function_exists('link_detach_modal_icon')) {
    /**
     * Generate detach icon link for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $withTooltip
     * @param  bool    $disabled
     *
     * @return \Illuminate\Support\HtmlString
     */
    function link_detach_modal_icon($url, array $attributes = [], $withTooltip = true, $disabled = false) {
        return Link::detachModalIcon($url, $attributes, $withTooltip, $disabled);
    }
}

if ( ! function_exists('link_edit_icon')) {
    /**
     * Generate edit icon link.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $withTooltip
     * @param  bool    $disabled
     *
     * @return \Illuminate\Support\HtmlString
     */
    function link_edit_icon($url, array $attributes = [], $withTooltip = true, $disabled = false) {
        return Link::editIcon($url, $attributes, $withTooltip, $disabled);
    }
}

if ( ! function_exists('link_edit_with_icon')) {
    /**
     * Generate edit link with icon.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return \Illuminate\Support\HtmlString
     */
    function link_edit_with_icon($url, array $attributes = [], $disabled = false) {
        return Link::editWithIcon($url, $attributes, $disabled);
    }
}

if ( ! function_exists('link_restore_modal_icon')) {
    /**
     * Generate restore icon link for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $withTooltip
     * @param  bool    $disabled
     *
     * @return \Illuminate\Support\HtmlString
     */
    function link_restore_modal_icon($url, array $attributes = [], $withTooltip = true, $disabled = false) {
        return Link::restoreModalIcon($url, $attributes, $withTooltip, $disabled);
    }
}

if ( ! function_exists('link_restore_modal_with_icon')) {
    /**
     * Generate restore link with icon for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return \Illuminate\Support\HtmlString
     */
    function link_restore_modal_with_icon($url, array $attributes = [], $disabled = false) {
        return Link::restoreModalWithIcon($url, $attributes, $disabled);
    }
}

if ( ! function_exists('link_show_icon')) {
    /**
     * Generate show icon link.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $withTooltip
     * @param  bool    $disabled
     *
     * @return \Illuminate\Support\HtmlString
     */
    function link_show_icon($url, array $attributes = [], $withTooltip = true, $disabled = false) {
        return Link::showIcon($url, $attributes, $withTooltip, $disabled);
    }
}
