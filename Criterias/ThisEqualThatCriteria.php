<?php

declare(strict_types=1);

namespace Ship\Criterias;

use Ship\Parents\Criterias\Criteria;

class ThisEqualThatCriteria extends Criteria
{
    public function __construct(
        private string $field,
        private string $value,
    ) {
    }

    public function apply($model)
    {
        return $model->where($this->field, $this->value);
    }
}
