<?php namespace Arcanesoft\Core\Helpers\UI\LinkTraits;

/**
 * Trait     RestoreLinks
 *
 * @package  Arcanesoft\Core\Helpers\UI\LinkTraits
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
trait RestoreLinks
{
    /**
     * Generate restore icon link for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function restoreModalIcon($url, array $attributes = [], $disabled = false)
    {
        return self::make('restore', $url, $attributes, $disabled)
                   ->size('xs')
                   ->withTitle(false);
    }

    /**
     * Generate restore link with icon for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function restoreModalWithIcon($url, array $attributes = [], $disabled = false)
    {
        return static::make('restore', $url, $attributes, $disabled)
                     ->size('sm')
                     ->withTitle(true)
                     ->tooltip(false);
    }
}
