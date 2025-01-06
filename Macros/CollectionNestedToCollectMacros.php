<?php

declare(strict_types=1);

namespace Ship\Macros;

use Illuminate\Support\Collection;
use Override;
use Ship\Parent\Macro\Macro;

use function is_array;
use function is_object;

final class CollectionNestedToCollectMacros extends Macro
{
    #[Override] public function register(): void
    {
        Collection::macro('toCollect', function () {
            return $this->map(function ($value) {
                if (is_array($value) || is_object($value)) {
                    return collect($value)->toCollect();
                }

                return $value;
            });
        });
    }
}
