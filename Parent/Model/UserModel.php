<?php

declare(strict_types=1);

namespace Ship\Parent\Model;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Nucleus\Abstracts\Model\AuthModel as AbstractModel;
use Nucleus\Traits\CanOwnTrait;

abstract class UserModel extends AbstractModel
{
    use Notifiable;
    use HasApiTokens;
    use CanOwnTrait;
}
