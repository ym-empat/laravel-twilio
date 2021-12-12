<?php

namespace Empat\LaravelTwilio;

use Illuminate\Support\ServiceProvider;

class LaravelTwilioServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '../config/twilio.php', 'twilio');

        $this->loadMigrationsFrom(__DIR__ . '../database/migrations');

        $this->loadTranslationsFrom(__DIR__ . '../resources/lang', 'twilio');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '../config/twilio.php' => config_path('twilio.php')
        ], 'laravel-twilio-config');

        $this->publishes([
            __DIR__ . '../database/migrations' => database_path('migrations')
        ], 'laravel-twilio-migrations');
    }
}