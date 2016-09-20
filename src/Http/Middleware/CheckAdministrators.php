<?php namespace Arcanesoft\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Factory as Auth;

/**
 * Class     AdminMiddleware
 *
 * @package  Arcanesoft\Foundation\Http\Middleware
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class CheckAdministrators
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * The authentication factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /* ------------------------------------------------------------------------------------------------
     |  Constructor
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

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
        $user = $this->auth->guard()->user();

        if (is_null($user) || ! $user->isAdmin())
            abort(404, "You're not allowed !");

        return $next($request);
    }
}
