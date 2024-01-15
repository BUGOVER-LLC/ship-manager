<?php

declare(strict_types=1);

namespace Ship\Criterias;

use Ship\Parents\Criterias\Criteria;

class ThisUserCriteria extends Criteria
{
    /**
     * @param int $userId
     */
    public function __construct(
        private int $userId,
    ) {
    }

    public function apply($model)
    {
        return $model->where('user_id', '=', $this->userId);
    }
}
