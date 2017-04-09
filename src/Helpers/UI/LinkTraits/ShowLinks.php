<?php namespace Arcanesoft\Core\Helpers\UI\LinkTraits;

/**
 * Class     ShowLinks
 *
 * @package  Arcanesoft\Core\Helpers\UI\LinkTraits
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
trait ShowLinks
{
    /**
     * Generate show icon link.
     *
     * @param  string  $url
     * @param  array   $attributes
     * @param  bool    $disabled
     *
     * @return self
     */
    public static function showIcon($url, array $attributes = [], $disabled = false)
    {
        return self::make('show', $url, $attributes, $disabled)
                   ->size('xs')
                   ->withTitle(false);
    }
}
