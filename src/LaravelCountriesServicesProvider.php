<?php

namespace Angelkurten\Countries;

use Illuminate\Support\ServiceProvider;

class LaravelCountriesServicesProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // The publication files to publish
        $this->publishes([__DIR__ . '/config/config.php' => config_path('countries.php')]);

        $this->publishes([
            __DIR__.'/database/Seeders/' => database_path('seeds')
        ], 'seeders');

        $this->publishes([
            __DIR__.'/database/migrations/' => database_path('migrations')
        ], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Append the country settings
        $this->mergeConfigFrom(
            __DIR__ . '/config/config.php', 'countries'
        );
    }
}
