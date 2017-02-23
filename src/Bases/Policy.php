<?php namespace Arcanesoft\Core\Bases;

use Arcanesoft\Contracts\Auth\Models\User;
use Arcanedev\Support\Bases\Policy as BasePolicy;

/**
 * Class     Policy
 *
 * @package  Arcanesoft\Core\Bases
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class Policy extends BasePolicy
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * The policy's before filter.
     *
     * @param  \Arcanesoft\Contracts\Auth\Models\User  $user
     * @param  mixed                                   $ability
     *
     * @return bool
     */
    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) return true;
    }
}
