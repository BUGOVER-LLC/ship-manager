<?php

declare(strict_types=1);

namespace Ship\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Ship\Parents\Providers\MainServiceProvider as ParentMainServiceProvider;

class ShipProvider extends ParentMainServiceProvider
{
    /**
     * Register any Service Providers on the Ship layer (including third party packages).
     */
    public array $serviceProviders = [
        RouteServiceProvider::class,
    ];

    /**
     * Register any Alias on the Ship layer (including third party packages).
     */
    protected array $aliases = [];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        /**
         * Load the ide-helper service provider only in non production environments.
         */
        if (class_exists('Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider') && $this->app->isLocal()) {
            $this->app->register(IdeHelperServiceProvider::class);
        }

        parent::register();
    }
}
