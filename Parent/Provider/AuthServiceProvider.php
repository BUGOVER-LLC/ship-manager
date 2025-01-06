<?php

declare(strict_types=1);

namespace Ship\Parent\Provider;

use Nucleus\Abstracts\Provider\AuthServiceProvider as AbstractAuthServiceProvider;

/**
 * Class ShipAuthServiceProvider
 *
 * App\Providers\AuthServiceProvider.php
 */
abstract class AuthServiceProvider extends AbstractAuthServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [];
}
