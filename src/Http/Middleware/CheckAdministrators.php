<?php namespace Arcanesoft\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class     AdminMiddleware
 *
 * @package  Arcanesoft\Foundation\Http\Middleware
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CheckAdministrators
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure                  $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var  \Arcanesoft\Contracts\Auth\Models\User  $user */
        $user = $request->user();

        if (is_null($user)) {
            abort(404, 'Guest not allowed !');
        }

        if ( ! $user->isAdmin()) {
            abort(404, 'User not allowed !');
        }

        return $next($request);
    }
}
