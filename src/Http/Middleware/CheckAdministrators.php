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
        $user = auth()->user();

        if (is_null($user) || ! $this->isAllowed($user)) {
            abort(404, "You're not allowed !");
        }

        return $next($request);
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Check if the user is allowed.
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\User  $user
     *
     * @return bool
     */
    private function isAllowed($user)
    {
        return $user->isAdmin() || $user->isModerator();
    }
}
