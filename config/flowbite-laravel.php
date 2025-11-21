<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Component Prefix
    |--------------------------------------------------------------------------
    |
    | This value determines the prefix used for Blade components.
    | For example, with 'ui' prefix, components are used as <x-ui.button>
    |
    */

    'prefix' => env('FLOWBITE_PREFIX', 'ui'),

    /*
    |--------------------------------------------------------------------------
    | Default Variants
    |--------------------------------------------------------------------------
    |
    | Set default variant values for components across your application.
    |
    */

    'defaults' => [
        'button' => [
            'variant' => 'primary',
            'size' => 'md',
        ],
        'badge' => [
            'variant' => 'default',
            'size' => 'sm',
        ],
        'alert' => [
            'variant' => 'info',
            'dismissible' => true,
        ],
        'modal' => [
            'size' => 'md',
            'backdrop' => true,
        ],
        'card' => [
            'shadow' => true,
            'border' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Dark Mode
    |--------------------------------------------------------------------------
    |
    | Enable or disable dark mode support globally.
    |
    */

    'dark_mode' => env('FLOWBITE_DARK_MODE', true),

    /*
    |--------------------------------------------------------------------------
    | CDN Assets
    |--------------------------------------------------------------------------
    |
    | Configure CDN URLs for Flowbite assets if needed.
    |
    */

    'cdn' => [
        'enabled' => env('FLOWBITE_CDN_ENABLED', false),
        'flowbite_js' => 'https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js',
        'alpine_js' => 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js',
    ],

    /*
    |--------------------------------------------------------------------------
    | Component Paths
    |--------------------------------------------------------------------------
    |
    | Customize component view paths if needed.
    |
    */

    'paths' => [
        'components' => resource_path('views/components/ui'),
        'views' => resource_path('views/vendor/flowbite'),
    ],

];