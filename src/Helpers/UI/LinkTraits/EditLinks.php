<?php namespace Arcanesoft\Core\Helpers\UI\LinkTraits;

/**
 * Trait     EditLinks
 *
 * @package  Arcanesoft\Core\Helpers\UI\LinkTraits
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
trait EditLinks
{
    /**
     * Generate edit icon link.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function editIcon($url, array $attributes = [], $disabled = false)
    {
        return self::make('edit', $url, $attributes, $disabled)
                   ->size('xs')
                   ->withTitle(false);
    }

    /**
     * Generate edit link with icon.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function editWithIcon($url, array $attributes = [], $disabled = false)
    {
        return self::make('edit', $url, $attributes, $disabled)
                   ->size('sm')
                   ->tooltip(false);
    }
}
