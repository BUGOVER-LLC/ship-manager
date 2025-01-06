<?php

declare(strict_types=1);

namespace Ship\Parent\Provider;

use Nucleus\Abstracts\Provider\EventServiceProvider as AbstractEventServiceProvider;

/**
 * Class EventServiceProvider
 *
 * A.K.A. app/Providers/EventServiceProvider.php
 */
abstract class EventServiceProvider extends AbstractEventServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [];

    protected $observers = [];

    protected $subscribe = [];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
