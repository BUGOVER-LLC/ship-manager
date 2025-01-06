<?php

declare(strict_types=1);

namespace Ship\Parent\Model;

use Nucleus\Abstracts\Model\Model as AbstractModel;
use Nucleus\Traits\CanOwnTrait;

abstract class Model extends AbstractModel
{
    use CanOwnTrait;
}
