<?php

declare(strict_types=1);

namespace Ship\Parent\Provider;

use Nucleus\Abstracts\Provider\MainServiceProvider as AbstractMainServiceProvider;

abstract class MainServiceProvider extends AbstractMainServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Register anything in the container.
     */
    public function register(): void
    {
        parent::register();
    }
}
