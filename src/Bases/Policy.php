<?php namespace Arcanesoft\Core\Bases;

use Arcanesoft\Contracts\Auth\Models\User;

/**
 * Class     Policy
 *
 * @package  Arcanesoft\Core\Bases
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
abstract class Policy
{
    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
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
