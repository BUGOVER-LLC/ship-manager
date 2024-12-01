<?php

declare(strict_types=1);

namespace Ship\Parents\Resources;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Nucleus\Traits\ConvertsSchemaToArray;

/**
 * Class BaseResource
 *
 * @package Src\Http\Resources
 * @property JsonResource $collection_data
 * @method Collection get(string $string, $default = null)
 * @method Collection gets(string $string, $default = null)
 * @method Collection stringSerialize(string $name)
 * @method LengthAwarePaginator currentPage()
 * @method LengthAwarePaginator url($url)
 * @method LengthAwarePaginator firstItem()
 * @method LengthAwarePaginator lastPage()
 * @method LengthAwarePaginator nextPageUrl()
 * @method LengthAwarePaginator path()
 * @method LengthAwarePaginator perPage()
 * @method LengthAwarePaginator previousPageUrl()
 * @method LengthAwarePaginator lastItem()
 * @method LengthAwarePaginator total()
 * @method LengthAwarePaginator hasPages()
 * @method LengthAwarePaginator items()
 */
abstract class Resource extends \Nucleus\Abstracts\Resources\Resource
{
}
