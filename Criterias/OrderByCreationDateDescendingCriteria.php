<?php

declare(strict_types=1);

namespace Ship\Criterias;

use Ship\Parents\Criterias\Criteria;

class OrderByCreationDateDescendingCriteria extends Criteria
{
    public function apply($model)
    {
        return $model->orderBy('created_at', 'desc');
    }
}
