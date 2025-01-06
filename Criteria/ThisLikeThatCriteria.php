<?php

declare(strict_types=1);

namespace Ship\Criteria;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Service\Repository\Contracts\EloquentRepositoryContract;
use Ship\Parent\Criteria\Criteria;

/**
 * Retrieves all entities where $field contains one or more of the given items in $valueString.
 */
class ThisLikeThatCriteria extends Criteria
{
    /**
     * @param string $field
     * @param string $valueString
     * @param string $separator
     * @param string $wildcard
     */
    public function __construct(
        private string $field,
        private string $valueString,
        private string $separator = ',',
        private string $wildcard = '*'
    )
    {
    }

    /**
     * Applies the criteria - if more than one value is separated by the configured separator we will "OR" all the params.
     */
    public function apply($model, EloquentRepositoryContract $repository): Model|Builder
    {
        return $model->where(function ($query) {
            $values = explode($this->separator, $this->valueString);
            $query->where($this->field, 'LIKE', str_replace($this->wildcard, '%', array_shift($values)));
            foreach ($values as $value) {
                $query->orWhere($this->field, 'LIKE', str_replace($this->wildcard, '%', $value));
            }
        });
    }
}
