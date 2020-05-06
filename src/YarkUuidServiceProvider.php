<?php

namespace YarkHQ\LaravelUuidModel;
use Illuminate\Support\ServiceProvider;
use YarkHQ\LaravelUuidModel\Commands\UuidMigrationCommand;

class YarkUuidServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                UuidMigrationCommand::class,
            ]);
        }
    }
}
