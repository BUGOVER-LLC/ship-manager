<?php

declare(strict_types=1);

namespace Ship\Criterias;

use Ship\Parents\Criterias\Criteria;
use Carbon\Carbon;

class CreatedTodayCriteria extends Criteria
{
    public function apply($model)
    {
        return $model->where('created_at', '>=', Carbon::today()->toDateString());
    }
}
