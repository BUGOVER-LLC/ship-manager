<?php

namespace Ship\Parents\Policies;

use Nucleus\Abstracts\Policies\Policy as AbstractPolicy;
use Ship\Parents\Models\UserModel;

abstract class Policy extends AbstractPolicy
{
    /**
     * Perform pre-authorization checks.
     *
     * @param UserModel $user
     * @param string $ability
     * @return bool|null
     */
    public function before(UserModel $user, string $ability): ?bool
    {
        //grant access for admins
        if (method_exists($user, 'hasAdminRole') && $user->hasAdminRole()) {
            return true;
        }

        return null;
    }
}
