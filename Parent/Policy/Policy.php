<?php

declare(strict_types=1);

namespace Ship\Parent\Policy;

use Nucleus\Abstracts\Policy\Policy as AbstractPolicy;
use Ship\Parent\Model\UserModel;

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
