<?php

namespace Destech\Packages\FlowbiteLaravel;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class FlowbiteLaravelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Merge package config with application config
        $this->mergeConfigFrom(
            __DIR__.'/../config/flowbite-laravel.php',
            'flowbite-laravel'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $basePath = realpath(__DIR__.'/..');

        // Register views namespace - components will be available as flowbite::components.xxx
        $this->loadViewsFrom($basePath.'/resources/views', 'ui');

        // Publish configuration
        $this->publishes([
            __DIR__.'/../config/flowbite-laravel.php' => config_path('flowbite-laravel.php'),
        ], 'flowbite-config');

        // Publish views
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/flowbite'),
        ], 'flowbite-views');

        // Publish components
        $this->publishes([
            __DIR__.'/../resources/views/components' => resource_path('views/components/ui'),
        ], 'flowbite-components');

        // Publish documentation
        $this->publishes([
            __DIR__.'/../docs' => base_path('docs/flowbite'),
        ], 'flowbite-docs');

        // Publish all assets
        $this->publishes([
            __DIR__.'/../config/flowbite-laravel.php' => config_path('flowbite-laravel.php'),
            __DIR__.'/../resources/views/components' => resource_path('views/components/ui'),
            __DIR__.'/../docs' => base_path('docs/flowbite'),
        ], 'flowbite-all');
    }
}
