# Installation Guide

Steps to install Flowbite Laravel components in your project.

## 1. Installation via Composer

### Installation from Packagist (After Publication)

```bash
composer require destech-packages/flowbite-laravel
```

### Local Installation (During Development)

Add the repository to your main project's `composer.json`:

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "./packages/flowbite-laravel"
        }
    ]
}
```

Then install the package:

```bash
composer require destech-packages/flowbite-laravel @dev
```

## 2. Configuration

### Publish Configuration File

```bash
php artisan vendor:publish --tag=flowbite-config
```

This command creates the `config/flowbite-laravel.php` file.

### Tailwind CSS Configuration

Update your `tailwind.config.js` file:

```js
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './vendor/destech-hasar-cozumleri-a-s/larabite/resources/**/*.blade.php',
  ],
  darkMode: 'class', // or 'media'
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#eff6ff',
          100: '#dbeafe',
          200: '#bfdbfe',
          300: '#93c5fd',
          400: '#60a5fa',
          500: '#3b82f6',
          600: '#2563eb',
          700: '#1d4ed8',
          800: '#1e40af',
          900: '#1e3a8a',
          950: '#172554',
        }
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
```

### Install Flowbite

```bash
npm install flowbite
```

## 3. Alpine.js Installation (Optional but Recommended)

Some interactive components require Alpine.js.

```bash
npm install alpinejs
```

In `resources/js/app.js`:

```js
import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()
```

## 4. Vite Configuration

In `vite.config.js`:

```js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
```

## 5. CSS Setup

In `resources/css/app.css`:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;

/* Optional for Flowbite */
@layer components {
    /* Custom style definitions */
}
```

## 6. Build Assets

```bash
npm install
npm run build

# For development:
npm run dev
```

## 7. Update Your Layout File

In `resources/views/layouts/app.blade.php`:

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS & JS via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- For Alpine.js (if using CDN) -->
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    {{ $slot }}
</body>
</html>
```

## 8. Start Using Components

```blade
<x-ui::button variant="primary">
    My First Button
</x-ui::button>

<x-ui::card>
    <x-ui::typography.heading level="2">
        Card Title
    </x-ui::typography.heading>
    <x-ui::typography.paragraph>
        Card content goes here.
    </x-ui::typography.paragraph>
</x-ui::card>
```

## Customizing Components (Optional)

If you want to customize components in your own project:

```bash
# Copy all components
php artisan vendor:publish --tag=flowbite-components

# To edit only specific components
php artisan vendor:publish --tag=flowbite-views
```

Components will be copied to the `resources/views/components/ui/` directory.

## Publish Documentation

```bash
php artisan vendor:publish --tag=flowbite-docs
```

Documentation will be copied to the `docs/flowbite/` directory.

## Using with Livewire

If you're using Livewire, no additional installation is required. All components are Livewire compatible:

```blade
<div>
    <x-ui::form.input
        label="Name"
        wire:model="name"
    />

    <x-ui::button
        wire:click="save"
        variant="primary"
    >
        Save
    </x-ui::button>
</div>
```

## Dark Mode Settings

### Class-based Dark Mode

In `tailwind.config.js`:

```js
module.exports = {
  darkMode: 'class',
  // ...
}
```

In your layout:

```blade
<html lang="en" class="dark">
```

### Dark Mode with Toggle

```blade
<div x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
     x-init="$watch('darkMode', val => {
         localStorage.setItem('darkMode', val);
         val ? document.documentElement.classList.add('dark') : document.documentElement.classList.remove('dark');
     })"
     :class="{'dark': darkMode}">

    <x-ui::button @click="darkMode = !darkMode">
        <span x-show="!darkMode">🌙 Dark Mode</span>
        <span x-show="darkMode">☀️ Light Mode</span>
    </x-ui::button>

    <!-- Page content -->
</div>
```

## .env Configuration

```env
# Component prefix (default: ui)
FLOWBITE_PREFIX=ui

# Dark mode support (default: true)
FLOWBITE_DARK_MODE=true

# CDN usage (default: false)
FLOWBITE_CDN_ENABLED=false
```

## Troubleshooting

### Components Not Showing

1. Clear cache:
```bash
php artisan view:clear
php artisan config:clear
php artisan cache:clear
```

2. Check Tailwind build:
```bash
npm run build
```

3. Verify package path in Tailwind config

### Styles Not Applied

1. Check `tailwind.config.js` content paths
2. Ensure CSS is loading correctly
3. Clear browser cache

### Alpine.js Not Working

1. Ensure Alpine.js is installed
2. Check browser console for errors
3. Verify script tag order

## Version Compatibility

| Flowbite Laravel | Laravel | PHP | Tailwind CSS |
|------------------|---------|-----|--------------|
| 1.x              | 10.x, 11.x | 8.1+ | 3.x |

## Next Steps

- [📖 Review Documentation](docs/README.md)
- [🎨 Check Component Examples](docs/components/examples.md)
- [⚙️ Configuration Options](config/flowbite-laravel.php)

## Support

If you're experiencing issues:
- [GitHub Issues](https://github.com/destech-packages/flowbite-laravel/issues)
- [Documentation](docs/README.md)
- Email: dev@destech-packages.com