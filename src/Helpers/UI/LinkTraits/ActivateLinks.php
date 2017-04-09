<?php namespace Arcanesoft\Core\Helpers\UI\LinkTraits;

/**
 * Trait     ActivateLinks
 *
 * @package  Arcanesoft\Core\Helpers\UI\LinkTraits
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
trait ActivateLinks
{
    /**
     * Generate activate icon link.
     *
     * @param  bool    $active
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function activateIcon($active, $url, array $attributes = [], $disabled = false)
    {
        return self::make($active ? 'enable' : 'disable', $url, $attributes, $disabled)
                   ->size('xs')
                   ->withTitle(false)
                   ->icon(true);
    }

    /**
     * Generate activate icon link for modals (reverse button based on active state).
     *
     * @param  bool    $active
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function activateModalIcon($active, $url, array $attributes = [], $disabled = false)
    {
        $dataAttribute = 'data-current-status';
        $statuses      = [
            'enabled'  => 'enabled',
            'disabled' => 'disabled',
        ];

        return self::make( ! $active ? 'enable' : 'disable', $url, $attributes, $disabled)
                   ->setAttribute($dataAttribute, $statuses[$active ? 'enabled' : 'disabled'])
                   ->size('xs')->withTitle(false);
    }

    /**
     * Generate activate link with icon for modals (reverse button based on active state).
     *
     * @param  bool    $active
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function activateModalWithIcon($active, $url, array $attributes = [], $disabled = false)
    {
        return static::activateModalIcon($active, $url, $attributes, $disabled)
                     ->size('sm')->withTitle(true)->tooltip(false);
    }
}
