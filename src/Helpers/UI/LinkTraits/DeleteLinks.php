<?php namespace Arcanesoft\Core\Helpers\UI\LinkTraits;

/**
 * Trait     DeleteLinks
 *
 * @package  Arcanesoft\Core\Helpers\UI\LinkTraits
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
trait DeleteLinks
{
    /**
     * Generate delete icon link for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function deleteModalIcon($url, array $attributes = [], $disabled = false)
    {
        return self::make('delete', $url, $attributes, $disabled)
                   ->size('xs')
                   ->withTitle(false);
    }

    /**
     * Generate delete link with icon for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function deleteModalWithIcon($url, array $attributes = [], $disabled = false)
    {
        return static::make('delete', $url, $attributes, $disabled)
                     ->size('sm')
                     ->withTitle(true)
                     ->tooltip(false);
    }
}
