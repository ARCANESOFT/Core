<?php namespace Arcanesoft\Core\Http\Middleware;

use Arcanedev\Support\Http\Middleware;
use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

/**
 * Class     AdminMiddleware
 *
 * @package  Arcanesoft\Foundation\Http\Middleware
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CheckAdministrators extends Middleware
{
    /* -----------------------------------------------------------------
     |  Main Methods
     | -----------------------------------------------------------------
     */

    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure                  $next
     *
     * @return mixed
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function handle(Request $request, Closure $next)
    {
        if ( ! $this->isAllowed())
            $this->failedAuthorization();

        return $next($request);
    }

    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Check if the user is allowed.
     *
     * @return bool
     */
    protected function isAllowed()
    {
        /** @var  \Arcanesoft\Contracts\Auth\Models\User  $user */
        if (is_null($user = auth()->user()))
            return false;

        return $user->isAdmin() || $user->isModerator();
    }

    /**
     * Handle a failed authorization attempt.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    protected function failedAuthorization()
    {
        throw new AuthorizationException(
            '[Unauthorized] You are not allowed to perform this action.', 403
        );
    }
}
