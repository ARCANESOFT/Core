<?php namespace Arcanesoft\Core\Helpers\UI;

use Illuminate\Support\Arr;
use Illuminate\Support\HtmlString;

/**
 * Class     Label
 *
 * @package  Arcanesoft\Core\Helpers\UI
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @TODO: Refactoring
 */
class Label
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Generate active icon label.
     *
     * @param  bool   $active
     * @param  array  $options
     * @param  bool   $withTooltip
     *
     * @return \Illuminate\Support\HtmlString
     */
    public static function activeIcon($active, array $options = [], $withTooltip = true)
    {
        // TODO: Refactor the options to a dedicated config file.
        $classes      = Arr::get($options, 'classes', [
            'enabled'  => 'label label-success',
            'disabled' => 'label label-default',
        ]);
        $translations = Arr::get($options, 'trans', [
            'enabled'  => 'core::statuses.enabled',
            'disabled' => 'core::statuses.disabled',
        ]);
        $icons = Arr::get($options, 'icons', [
            'enabled'  => 'fa fa-fw fa-check',
            'disabled' => 'fa fa-fw fa-ban',
        ]);

        $key        = $active ? 'enabled' : 'disabled';
        $attributes = ['class' => $classes[$key]];
        $value      = static::generateIcon($icons[$key]);

        return $withTooltip
            ? static::generateWithTooltip($value, ucfirst(trans($translations[$key])), $attributes)
            : static::generate($value, $attributes);
    }

    /**
     * Generate active status label.
     *
     * @param  bool   $active
     * @param  array  $options
     * @param  bool   $withIcon
     *
     * @return \Illuminate\Support\HtmlString
     */
    public static function activeStatus($active, array $options = [], $withIcon = true)
    {
        // TODO: Refactor the options to a dedicated config file.
        $classes      = Arr::get($options, 'classes', [
            'enabled'  => 'label label-success',
            'disabled' => 'label label-default',
        ]);
        $translations = Arr::get($options, 'trans', [
            'enabled'  => 'core::statuses.enabled',
            'disabled' => 'core::statuses.disabled',
        ]);
        $icons = Arr::get($options, 'icons', [
            'enabled'  => 'fa fa-fw fa-check',
            'disabled' => 'fa fa-fw fa-ban',
        ]);

        $key        = $active ? 'enabled' : 'disabled';
        $attributes = ['class' => $classes[$key]];

        return $withIcon
            ? static::generateWithIcon(ucfirst(trans($translations[$key])), $icons[$key], $attributes)
            : static::generate(ucfirst(trans($translations[$key])), $attributes);
    }

    /**
     * Generate check status label.
     *
     * @param  bool   $checked
     * @param  array  $options
     * @param  bool   $withTooltip
     *
     * @return \Illuminate\Support\HtmlString
     */
    public static function checkIcon($checked, array $options = [], $withTooltip = true)
    {
        $classes      = Arr::get($options, 'classes', [
            'checked'   => 'label label-success',
            'unchecked' => 'label label-default',
        ]);

        $translations = Arr::get($options, 'trans', [
            'checked'   => 'core::statuses.checked',
            'unchecked' => 'core::statuses.unchecked',
        ]);

        $icons = Arr::get($options, 'icons', [
            'checked'   => 'fa fa-fw fa-check',
            'unchecked' => 'fa fa-fw fa-ban',
        ]);

        $key        = $checked ? 'checked' : 'unchecked';
        $attributes = ['class' => $classes[$key]];
        $value      = static::generateIcon($icons[$key]);

        return $withTooltip
            ? static::generateWithTooltip($value, ucfirst(trans($translations[$key])), $attributes)
            : static::generate($value, $attributes);
    }

    /**
     * Generate check status label.
     *
     * @param  bool   $checked
     * @param  array  $options
     * @param  bool   $withIcon
     *
     * @return \Illuminate\Support\HtmlString
     */
    public static function checkStatus($checked, array $options = [], $withIcon = true)
    {
        // TODO: Refactor the options to a dedicated config file.
        $classes      = Arr::get($options, 'classes', [
            'checked'   => 'label label-success',
            'unchecked' => 'label label-default',
        ]);
        $translations = Arr::get($options, 'trans', [
            'checked'   => 'core::statuses.checked',
            'unchecked' => 'core::statuses.unchecked',
        ]);
        $icons = Arr::get($options, 'icons', [
            'checked'   => 'fa fa-fw fa-check',
            'unchecked' => 'fa fa-fw fa-ban',
        ]);

        $key        = $checked ? 'checked' : 'unchecked';
        $attributes = ['class' => $classes[$key]];

        return $withIcon
            ? static::generateWithIcon(ucfirst(trans($translations[$key])), $icons[$key], $attributes)
            : static::generate(ucfirst(trans($translations[$key])), $attributes);
    }

    /**
     * Generate count label.
     *
     * @param  int|float  $count
     * @param  array      $options
     *
     * @return \Illuminate\Support\HtmlString
     */
    public static function count($count, array $options = []) {

        // TODO: Refactor the options to a dedicated config file.
        $classes = Arr::get($options, 'classes', [
            'positive' => 'label label-info',
            'zero'     => 'label label-default',
            'negative' => 'label label-danger',
        ]);

        return static::generate($count, [
            'class' => $count > 0 ? $classes['positive'] : ($count < 0 ? $classes['negative'] : $classes['zero'])
        ]);
    }

    /**
     * Generate locked icon label.
     *
     * @param  bool   $locked
     * @param  array  $options
     * @param  bool   $withTooltip
     *
     * @return \Illuminate\Support\HtmlString
     */
    public static function lockedIcon($locked, array $options = [], $withTooltip = true)
    {
        // TODO: Refactor the options to a dedicated config file.
        $classes      = Arr::get($options, 'classes', [
            'locked'   => 'label label-danger',
            'unlocked' => 'label label-success',
        ]);
        $translations = Arr::get($options, 'trans', [
            'locked'   => 'core::statuses.locked',
            'unlocked' => 'core::statuses.unlocked',
        ]);
        $icons = Arr::get($options, 'icons', [
            'locked'   => 'fa fa-fw fa-lock',
            'unlocked' => 'fa fa-fw fa-unlock',
        ]);

        $key        = $locked ? 'locked' : 'unlocked';
        $value      = static::generateIcon($icons[$key]);
        $attributes = ['class' => $classes[$key]];

        return $withTooltip
            ? static::generateWithTooltip($value, ucfirst(trans($translations[$key])), $attributes)
            : static::generate($value, $attributes);
    }

    /**
     * Generate locked status label.
     *
     * @param  bool   $locked
     * @param  array  $options
     * @param  bool   $withIcon
     *
     * @return \Illuminate\Support\HtmlString
     */
    public static function lockedStatus($locked, array $options = [], $withIcon = true)
    {
        // TODO: Refactor the options to a dedicated config file.
        $classes      = Arr::get($options, 'classes', [
            'locked'   => 'label label-danger',
            'unlocked' => 'label label-success',
        ]);
        $translations = Arr::get($options, 'trans', [
            'locked'   => 'core::statuses.locked',
            'unlocked' => 'core::statuses.unlocked',
        ]);
        $icons = Arr::get($options, 'icons', [
            'locked'   => 'fa fa-fw fa-lock',
            'unlocked' => 'fa fa-fw fa-unlock',
        ]);

        $key        = $locked ? 'locked' : 'unlocked';
        $value      = ucfirst(trans($translations[$key]));
        $attributes = ['class' => $classes[$key]];

        return $withIcon
            ? static::generateWithIcon($value, $icons[$key], $attributes)
            : static::generate($value, $attributes);
    }

    /**
     * Generate trashed icon label.
     *
     * @param  array  $options
     * @return \Illuminate\Support\HtmlString
     */
    public static function trashedStatus(array $options = [], $withIcon = true)
    {
        $trans      = Arr::get($options, 'trans', 'core::statuses.trashed');
        $icon       = Arr::get($options, 'icon', 'fa fa-fw fa-trash-o');
        $attributes = [
            'class' => Arr::get($options, 'class', 'label label-danger')
        ];

        return $withIcon
            ? static::generateWithIcon(ucfirst(trans($trans)), $icon, $attributes)
            : static::generate(ucfirst(trans($trans)), $attributes);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Generate the label.
     *
     * @param  mixed  $value
     * @param  array  $attributes
     *
     * @return \Illuminate\Support\HtmlString
     */
    protected static function generate($value, array $attributes = [])
    {
        return new HtmlString(
            '<span'.html()->attributes($attributes).'>'.$value.'</span>'
        );
    }

    /**
     * Generate the label with tooltip.
     *
     * @param  string  $value
     * @param  string  $title
     * @param  array   $attributes
     *
     * @return \Illuminate\Support\HtmlString
     */
    protected static function generateWithTooltip($value, $title, array $attributes = [])
    {
        $attributes['data-toggle']         = 'tooltip';
        $attributes['data-original-title'] = $title;

        return static::generate($value, $attributes);
    }

    /**
     * Generate the label with icon & text as value.
     *
     * @param  string  $value
     * @param  string  $icon
     * @param  array   $attributes
     *
     * @return \Illuminate\Support\HtmlString
     */
    protected static function generateWithIcon($value, $icon, array $attributes = [])
    {
        return static::generate(static::generateIcon($icon). ' '.$value, $attributes);
    }

    /**
     * Generate icon tag.
     *
     * @param  string  $class
     *
     * @return string
     */
    protected static function generateIcon($class)
    {
        return '<i class="'.$class.'"></i>';
    }
}
