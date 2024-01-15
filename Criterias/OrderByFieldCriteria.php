<?php

declare(strict_types=1);

namespace Ship\Criterias;

use Ship\Parents\Criterias\Criteria;
use Illuminate\Support\Str;
use InvalidArgumentException;

class OrderByFieldCriteria extends Criteria
{
    public function __construct(
        private string $field,
        private string $sortOrder
    ) {

        if (!$this->isValidSortOrder($sortOrder)) {
            throw new InvalidArgumentException("Invalid argument supplied. Valid arguments are 'asc' and 'desc'");
        }
    }

    private function isValidSortOrder(string $sortOrder): bool
    {
        $sortOrder = Str::lower($sortOrder);
        $availableDirections = [
            'asc',
            'desc',
        ];

        return in_array($sortOrder, $availableDirections, true);
    }

    public function apply($model)
    {
        return $model->orderBy($this->field, $this->sortOrder);
    }
}
