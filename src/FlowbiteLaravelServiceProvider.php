<?php

namespace Destech\Packages\FlowbiteLaravel;

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
        // Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'flowbite');

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

        // Register Blade components
        $this->registerBladeComponents();
    }

    /**
     * Register Blade components.
     */
    protected function registerBladeComponents(): void
    {
        $prefix = config('flowbite-laravel.prefix', 'ui');

        // Typography components
        $this->registerComponent('typography.heading', $prefix);
        $this->registerComponent('typography.paragraph', $prefix);
        $this->registerComponent('typography.text', $prefix);
        $this->registerComponent('typography.blockquote', $prefix);
        $this->registerComponent('typography.image', $prefix);
        $this->registerComponent('typography.list', $prefix);
        $this->registerComponent('typography.list-item', $prefix);
        $this->registerComponent('typography.link', $prefix);
        $this->registerComponent('typography.hr', $prefix);

        // UI components
        $this->registerComponent('accordion', $prefix);
        $this->registerComponent('alert', $prefix);
        $this->registerComponent('avatar', $prefix);
        $this->registerComponent('badge', $prefix);
        $this->registerComponent('banner', $prefix);
        $this->registerComponent('bottom-nav', $prefix);
        $this->registerComponent('breadcrumb', $prefix);
        $this->registerComponent('button', $prefix);
        $this->registerComponent('card', $prefix);
        $this->registerComponent('clipboard', $prefix);
        $this->registerComponent('dropdown', $prefix);
        $this->registerComponent('footer', $prefix);
        $this->registerComponent('gallery', $prefix);
        $this->registerComponent('hero', $prefix);
        $this->registerComponent('indicator', $prefix);
        $this->registerComponent('kbd', $prefix);
        $this->registerComponent('list-group', $prefix);
        $this->registerComponent('modal', $prefix);
        $this->registerComponent('navbar', $prefix);
        $this->registerComponent('pagination', $prefix);
        $this->registerComponent('popover', $prefix);
        $this->registerComponent('progress', $prefix);
        $this->registerComponent('rating', $prefix);
        $this->registerComponent('sidebar', $prefix);
        $this->registerComponent('skeleton', $prefix);
        $this->registerComponent('speed-dial', $prefix);
        $this->registerComponent('stepper', $prefix);
        $this->registerComponent('table', $prefix);
        $this->registerComponent('tabs', $prefix);
        $this->registerComponent('timeline', $prefix);
        $this->registerComponent('toast', $prefix);
        $this->registerComponent('tooltip', $prefix);
        $this->registerComponent('video', $prefix);

        // Form components
        $this->registerComponent('form.input', $prefix);
        $this->registerComponent('form.select', $prefix);
        $this->registerComponent('form.textarea', $prefix);
        $this->registerComponent('form.checkbox', $prefix);
        $this->registerComponent('form.radio', $prefix);
        $this->registerComponent('form.toggle', $prefix);
        $this->registerComponent('form.range', $prefix);
        $this->registerComponent('form.file-input', $prefix);
        $this->registerComponent('form.search-input', $prefix);
        $this->registerComponent('form.number-input', $prefix);
        $this->registerComponent('form.phone-input', $prefix);
        $this->registerComponent('form.datepicker', $prefix);
        $this->registerComponent('form.timepicker', $prefix);
        $this->registerComponent('form.floating-label', $prefix);

        // Form helper components
        $this->registerComponent('form.label', $prefix);
        $this->registerComponent('form.validation-message', $prefix);

        // Icon components
        $this->registerComponent('icon.close', $prefix);
        $this->registerComponent('icon.spinner', $prefix);
    }

    /**
     * Register a single Blade component.
     */
    protected function registerComponent(string $component, string $prefix): void
    {
        $componentClass = $this->getComponentClass($component);

        if (class_exists($componentClass)) {
            \Illuminate\Support\Facades\Blade::component($componentClass, "{$prefix}.{$component}");
        }
    }

    /**
     * Get the fully qualified class name for a component.
     */
    protected function getComponentClass(string $component): string
    {
        $className = str_replace(['.', '-'], ['\\', ''], ucwords($component, '.-'));
        return "Destech\Packages\\FlowbiteLaravel\\Components\\{$className}";
    }
}
