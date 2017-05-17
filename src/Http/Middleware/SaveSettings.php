<?php namespace Arcanesoft\Core\Http\Middleware;

use Arcanedev\Support\Http\Middleware;
use Closure;

/**
 * Class     SaveSettings
 *
 * @package  Arcanesoft\Core\Http\Middleware
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class SaveSettings extends Middleware
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Handle the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure                  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    /**
     * Terminate the request.
     */
    public function terminate()
    {
        settings()->save();
    }
}
