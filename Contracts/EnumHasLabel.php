<?php

declare(strict_types=1);

namespace Ship\Contracts;

interface EnumHasLabel
{
    /**
     * @return string|null
     */
    public function getLabel(): ?string;
}
