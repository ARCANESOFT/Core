<?php namespace Arcanesoft\Core\Entities;

/**
 * Class     YesOrNo
 *
 * @package  Arcanesoft\Core\Entities
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class YesOrNo
{
    /* -----------------------------------------------------------------
     |  Constants
     | -----------------------------------------------------------------
     */

    const YES = 'yes';
    const NO  = 'no';

    /* -----------------------------------------------------------------
     |  All
     | -----------------------------------------------------------------
     */

    /**
     * Get all.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function all()
    {
        return static::keys()->mapWithKeys(function ($status) {
            return [$status => trans("core::statuses.{$status}")];
        });
    }

    /**
     * Get all keys.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function keys()
    {
        return collect([static::YES, static::NO]);
    }

    /**
     * Get a translated YoN status.
     *
     * @param  string|boolean  $key
     * @param  null            $default
     *
     * @return string|null
     */
    public static function get($key, $default = null)
    {
        return static::all()->get(static::parseKey($key), $default);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Parse the key.
     *
     * @param  string|boolean  $key
     *
     * @return string
     */
    private static function parseKey($key)
    {
        return is_bool($key) ? ($key ? static::YES : static::NO) : $key;
    }
}
