<?php namespace Arcanesoft\Core\Helpers\UI;

use Illuminate\Support\Arr;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

/**
 * Class     Link
 *
 * @package  Arcanesoft\Core\Helpers\UI
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 *
 * @TODO: Refactoring
 */
class Link
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */
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
    public static function activateIcon($active, $url, array $attributes = [], $withTooltip = true, $disabled = false)
    {
        // TODO: Refactor the options to a dedicated config file.
        $classes = [
            'enable'  => 'btn btn-xs btn-success',
            'disable' => 'btn btn-xs btn-inverse',
        ];
        $trans   = [
            'enable'  => 'core::actions.enable',
            'disable' => 'core::actions.disable',
        ];
        $icons   = [
            'enable'  => 'fa fa-fw fa-power-off',
            'disable' => 'fa fa-fw fa-power-off',
        ];

        $key        = $active ? 'enable' : 'disable';
        $value      = '<i class="'.$icons[$key].'"></i>';

        $attributes['class'] = $classes[$key];

        if ($withTooltip) {
            $attributes['data-toggle']         = 'tooltip';
            $attributes['data-original-title'] = Str::ucfirst(trans($trans[$key]));
        }

        return $disabled
            ? static::generateDisabledForIcons($value, $attributes)
            : static::generate($url, $value, $attributes);
    }

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
    public static function activateModalIcon($active, $url, array $attributes = [], $withTooltip = true, $disabled = false)
    {
        // TODO: Refactor the options to a dedicated config file.
        $dataAttribute = 'data-current-status';
        $statuses      = [
            'enabled'  => 'enabled',
            'disabled' => 'disabled',
        ];

        if ($disabled)
            $attributes = static::cleanAttributes($attributes);

        $key = $active ? 'enabled' : 'disabled';

        $attributes = array_merge($attributes, [
            $dataAttribute => $statuses[$key],
        ]);

        return static::activateIcon( ! $active, $url, $attributes, $withTooltip, $disabled);
    }

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
    public static function activateModalWithIcon($active, $url, array $attributes = [], $disabled = false)
    {
        // TODO: Refactor the options to a dedicated config file.
        $icons   = [
            'enabled'  => 'fa fa-fw fa-power-off',
            'disabled' => 'fa fa-fw fa-power-off',
        ];
        $classes = [
            'enabled'  => 'btn btn-sm btn-success',
            'disabled' => 'btn btn-sm btn-inverse',
        ];
        $trans = [
            'enabled'  => 'core::actions.enable',
            'disabled' => 'core::actions.disable',
        ];

        $key = $active ? 'enabled' : 'disabled';

        $attributes['class'] = $classes[$key];

        $value = '<i class="'.$icons[$key].'"></i> '.Str::ucfirst(trans($trans[$key]));

        return $disabled
            ? static::generateDisabled($value, $attributes)
            : static::generate($url, $value, $attributes);
    }

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
    public static function addIcon($url, array $attributes = [], $withTooltip = true, $disabled = false)
    {
        // TODO: Refactor the options to a dedicated config file.
        $class = 'btn btn-xs btn-primary';
        $icon  = 'fa fa-fw fa-plus';

        $attributes['class'] = $class;

        if ($withTooltip) {
            $attributes['data-toggle']         = 'tooltip';
            $attributes['data-original-title'] = Str::ucfirst(trans('core::actions.add'));
        }

        $value = '<i class="'.$icon.'"></i>';

        return $disabled
            ? static::generateDisabledForIcons($value, $attributes)
            : static::generate($url, $value, $attributes);
    }

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
    public static function deleteModalIcon($url, array $attributes = [], $withTooltip = true, $disabled = false)
    {
        // TODO: Refactor the options to a dedicated config file.
        $icon  = 'fa fa-fw fa-trash-o';
        $class = 'btn btn-xs btn-danger';
        $trans = 'core::actions.delete';

        $value               = '<i class="'.$icon.'"></i>';
        $attributes['class'] = $class;

        if ($disabled)
            $attributes = static::cleanAttributes($attributes);

        if ($withTooltip) {
            $attributes['data-toggle']         = 'tooltip';
            $attributes['data-original-title'] = Str::ucfirst(trans($trans));
        }

        return $disabled
            ? static::generateDisabledForIcons($value, $attributes)
            : static::generate($url, $value, $attributes);
    }

    /**
     * Generate delete link with icon for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return \Illuminate\Support\HtmlString
     */
    public static function deleteModalWithIcon($url, array $attributes = [], $disabled = false)
    {
        // TODO: Refactor the options to a dedicated config file.
        $icon  = 'fa fa-fw fa-trash-o';
        $class = 'btn btn-sm btn-danger';
        $trans = 'core::actions.delete';

        $attributes['class'] = $class;

        $value = '<i class="'.$icon.'"></i> '.Str::ucfirst(trans($trans));

        return $disabled
            ? static::generateDisabled($value, $attributes)
            : static::generate($url, $value, $attributes);
    }

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
    public static function detachModalIcon($url, array $attributes = [], $withTooltip = true, $disabled = false)
    {
        // TODO: Refactor the options to a dedicated config file.
        $icon  = 'fa fa-fw fa-chain-broken';
        $class = 'btn btn-xs btn-danger';
        $trans = 'core::actions.detach';

        $value               = '<i class="'.$icon.'"></i>';
        $attributes['class'] = $class;

        if ($disabled)
            $attributes = static::cleanAttributes($attributes);

        if ($withTooltip) {
            $attributes['data-toggle']         = 'tooltip';
            $attributes['data-original-title'] = Str::ucfirst(trans($trans));
        }

        return $disabled
            ? static::generateDisabledForIcons($value, $attributes)
            : static::generate($url, $value, $attributes);
    }

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
    public static function editIcon($url, array $attributes = [], $withTooltip = true, $disabled = false)
    {
        // TODO: Refactor the options to a dedicated config file.
        $icon  = 'fa fa-fw fa-pencil';
        $class = 'btn btn-xs btn-warning';

        $attributes['class'] = $class;

        if ($withTooltip) {
            $attributes['data-toggle']         = 'tooltip';
            $attributes['data-original-title'] = Str::ucfirst(trans('core::actions.edit'));
        }

        $value = '<i class="'.$icon.'"></i>';

        return $disabled
            ? static::generateDisabledForIcons($value, $attributes)
            : static::generate($url, $value, $attributes);
    }

    /**
     * Generate edit link with icon.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return \Illuminate\Support\HtmlString
     */
    public static function editWithIcon($url, array $attributes = [], $disabled = false)
    {
        // TODO: Refactor the options to a dedicated config file.
        $icon  = 'fa fa-fw fa-pencil';
        $class = 'btn btn-sm btn-warning';
        $trans = 'core::actions.edit';

        $attributes['class'] = $class;

        $value = '<i class="'.$icon.'"></i> '.Str::ucfirst(trans($trans));

        return $disabled
            ? static::generateDisabled($value, $attributes)
            : static::generate($url, $value, $attributes);
    }

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
    public static function restoreModalIcon($url, array $attributes = [], $withTooltip = true, $disabled = false)
    {
        // TODO: Refactor the options to a dedicated config file.
        $icon  = 'fa fa-fw fa-reply';
        $class = 'btn btn-xs btn-primary';
        $trans = 'core::actions.restore';

        $attributes['class'] = $class;

        if ($disabled)
            $attributes = static::cleanAttributes($attributes);

        if ($withTooltip) {
            $attributes['data-toggle']         = 'tooltip';
            $attributes['data-original-title'] = Str::ucfirst(trans($trans));
        }

        $value = '<i class="'.$icon.'"></i>';

        return $disabled
            ? static::generateDisabledForIcons($value, $attributes)
            : static::generate($url, $value, $attributes);
    }

    /**
     * Generate restore link with icon for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return \Illuminate\Support\HtmlString
     */
    public static function restoreModalWithIcon($url, array $attributes = [], $disabled = false)
    {
        // TODO: Refactor the options to a dedicated config file.
        $icon  = 'fa fa-fw fa-reply';
        $class = 'btn btn-sm btn-primary';
        $trans = 'core::actions.restore';

        $attributes['class'] = $class;

        $value = '<i class="'.$icon.'"></i> '.Str::ucfirst(trans($trans));

        return $disabled
            ? static::generateDisabled($value, $attributes)
            : static::generate($url, $value, $attributes);
    }

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
    public static function showIcon($url, array $attributes = [], $withTooltip = true, $disabled = false)
    {
        // TODO: Refactor the options to a dedicated config file.
        $icon  = 'fa fa-fw fa-search';
        $class = 'btn btn-xs btn-info';

        $attributes['class'] = $class;

        if ($withTooltip) {
            $attributes['data-toggle']         = 'tooltip';
            $attributes['data-original-title'] = Str::ucfirst(trans('core::actions.show'));
        }

        $value = '<i class="'.$icon.'"></i>';

        return $disabled
            ? static::generateDisabledForIcons($value, $attributes)
            : static::generate($url, $value, $attributes);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */
    /**
     * @param  string  $value
     * @param  array   $attributes
     *
     * @return \Illuminate\Support\HtmlString
     */
    protected static function generateDisabledForIcons($value, array $attributes)
    {
        return static::generate('javascript:void(0);', $value, array_merge($attributes, [
            'class'    => 'btn btn-xs btn-default',
            'disabled' => 'disabled',
        ]));
    }

    /**
     * Generate a disabled link.
     *
     * @param  string  $value
     * @param  array   $attributes
     *
     * @return \Illuminate\Support\HtmlString
     */
    protected static function generateDisabled($value, array $attributes)
    {
        return static::generate('javascript:void(0);', $value, array_merge($attributes, [
            'class'    => 'btn btn-sm btn-default',
            'disabled' => 'disabled',
        ]));
    }

    /**
     * Generate the link.
     *
     * @param  string  $url
     * @param  string  $value
     * @param  array   $attributes
     *
     * @return \Illuminate\Support\HtmlString
     */
    protected static function generate($url, $value, array $attributes)
    {
        return new HtmlString(
            '<a href="'.$url.'"'.html()->attributes($attributes).'>'.$value.'</a>'
        );
    }

    /**
     * Clean the attributes if the link is disabled.
     *
     * @param  array  $attributes
     *
     * @return array
     */
    private static function cleanAttributes(array $attributes)
    {
        // TODO: Make the needles configurable
        return Arr::where($attributes, function ($value, $key) {
            return ! Str::startsWith($key, ['data-']);
        });
    }
}
