<?php namespace Arcanesoft\Core\Helpers\UI\LinkTraits;

/**
 * Trait     DetachLinks
 *
 * @package  Arcanesoft\Core\Helpers\UI\LinkTraits
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
trait DetachLinks
{
    /**
     * Generate detach icon link for modals.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function detachModalIcon($url, array $attributes = [], $disabled = false)
    {
        return self::make('detach', $url, $attributes, $disabled)
                   ->size('xs')
                   ->withTitle(false);
    }
}
