<?php namespace Arcanesoft\Core\Entities;

/**
 * Class     Yon
 *
 * @package  Arcanesoft\Core\Entities
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class Yon
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
        return collect([
            static::YES => trans('core::statuses.'.static::YES),
            static::NO  => trans('core::statuses.'.static::NO),
        ]);
    }

    /**
     * Get all keys.
     *
     * @return \Illuminate\Support\Collection
     */
    public static function keys()
    {
        return static::all()->keys();
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

    /**
     * Parse the key.
     *
     * @param  string|boolean  $key
     *
     * @return string
     */
    private static function parseKey($key)
    {
        return is_bool($key)
            ? ($key ? static::YES : static::NO)
            : $key;
    }
}
