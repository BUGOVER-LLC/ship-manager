<?php

declare(strict_types=1);

namespace Ship\Provider;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Ship\Parent\Provider\MainServiceProvider as ParentMainServiceProvider;

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

        $this->strictModeAdoption();
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        parent::register();

        $this->app->bind(
            'db.schema',
            fn() => Schema::customizedSchemaBuilder()
        );

        /**
         * Load the ide-helper service provider only in non production environments.
         */
        if (class_exists('Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider') && $this->app->isLocal()) {
            $this->app->register(IdeHelperServiceProvider::class);
        }
    }

    protected function strictModeAdoption(): void
    {
        if (app()->isProduction()) {
            return;
        }

        $strict = (bool) config('nucleus.strict');
        $level = (int) config('nucleus.strict_level');

        if ($strict) {
            switch ($level) {
                case 1:
                    Model::shouldBeStrict();
                    break;
                case 2:
                    Model::preventLazyLoading();
                    Model::preventAccessingMissingAttributes();
                    Model::preventSilentlyDiscardingAttributes(false);
                    break;
                case 3:
                    Model::preventSilentlyDiscardingAttributes(false);
                    break;
            }
        }
    }
}
