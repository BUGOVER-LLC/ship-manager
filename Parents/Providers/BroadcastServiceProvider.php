<?php

declare(strict_types=1);

namespace Ship\Parents\Providers;

use Illuminate\Support\Facades\Broadcast;
use Nucleus\Abstracts\Providers\BroadcastServiceProvider as AbstractBroadcastServiceProvider;

/**
 * Class BroadcastServiceProvider
 *
 * A.K.A. app/Providers/BroadcastServiceProvider.php
 */
abstract class BroadcastServiceProvider extends AbstractBroadcastServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        require app_path('Ship/Broadcasts/channels.php');
    }
}
