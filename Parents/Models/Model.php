<?php

declare(strict_types=1);

namespace Ship\Parents\Models;

use Nucleus\Abstracts\Models\Model as AbstractModel;
use Nucleus\Traits\CanOwnTrait;

abstract class Model extends AbstractModel
{
    use CanOwnTrait;
}
