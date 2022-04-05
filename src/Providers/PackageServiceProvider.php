<?php

namespace Vendor\Filterable\Providers;

use Illuminate\Support\ServiceProvider;
use Laravelir\Filterable\Console\Commands\InstallPackageCommand;
use Laravelir\Filterable\Facades\Filterable as FacadesFilterable;

class FilterableServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../../config/filterable.php", 'filterable');

        // $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // $this->registerViews();

        $this->registerFacades();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerCommands();
    }

    private function registerFacades()
    {
        $this->app->bind('filterable', function ($app) {
            return new FacadesFilterable();
        });
    }

    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {

            $this->commands([
                InstallPackageCommand::class,
            ]);
        }
    }

    public function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../../config/filterable.php' => config_path('filterable.php')
        ], 'filterable-config');
    }
}
