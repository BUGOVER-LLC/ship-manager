<?php

declare(strict_types=1);

namespace Ship\Contract;

interface EnumHasLabel
{
    /**
     * @return string|null
     */
    public function getLabel(): ?string;
}
