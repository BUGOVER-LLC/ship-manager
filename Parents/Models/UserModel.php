<?php

declare(strict_types=1);

namespace Ship\Parents\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Nucleus\Abstracts\Models\UserModel as AbstractUserModel;
use Nucleus\Traits\CanOwnTrait;
use Spatie\Permission\Traits\HasRoles;

abstract class UserModel extends AbstractUserModel
{
    use Notifiable;
    use HasApiTokens;
    use HasRoles;
    use CanOwnTrait;
}
