<?php namespace Arcanesoft\Core\Helpers\UI\LinkTraits;

/**
 * Trait     AddLinks
 *
 * @package  Arcanesoft\Core\Helpers\UI\LinkTraits
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
trait AddLinks
{
    /**
     * Generate add icon link.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function addIcon($url, array $attributes = [], $disabled = false)
    {
        return self::make('add', $url, $attributes, $disabled)
                   ->size('xs')
                   ->withTitle(false);
    }
}
