# Flowbite Laravel Components

<p align="center">
<img src="https://flowbite.com/docs/images/logo.svg" width="400" alt="Flowbite Laravel">
</p>

<p align="center">
<a href="https://packagist.org/packages/destech-hasar-cozumleri-a-s/larabite"><img src="https://img.shields.io/packagist/v/destech-hasar-cozumleri-a-s/larabite" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/destech-hasar-cozumleri-a-s/larabite"><img src="https://img.shields.io/packagist/dt/destech-hasar-cozumleri-a-s/larabite" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/destech-hasar-cozumleri-a-s/larabite"><img src="https://img.shields.io/packagist/l/destech-hasar-cozumleri-a-s/larabite" alt="License"></a>
</p>

## About

Flowbite Laravel Components is a complete Laravel package containing **60+ pre-built UI components**. Following the Flowbite design system, it provides seamless integration with Tailwind CSS, Alpine.js, and Livewire.

### ✨ Features

- ✅ **60+ Ready Components** - Typography, UI, Form components
- ✅ **Flowbite Design System** - Professional and consistent design
- ✅ **Tailwind CSS** - Utility-first CSS framework
- ✅ **Alpine.js Integration** - Reactive components
- ✅ **Livewire Support** - Full-stack Laravel experience
- ✅ **Dark Mode** - Complete dark mode support
- ✅ **Responsive** - Mobile-first design
- ✅ **Accessible** - WCAG 2.1 AA compliant
- ✅ **Comprehensive Documentation** - Detailed usage guide

## Installation

Install the package via Composer:

```bash
composer require destech-hasar-cozumleri-a-s/larabite
```

The service provider will be automatically discovered (Laravel 5.5+).

### Publish Configuration File

```bash
php artisan vendor:publish --tag=flowbite-config
```

### Publish Components (For Customization)

```bash
# Publish all components
php artisan vendor:publish --tag=flowbite-components

# Publish only views
php artisan vendor:publish --tag=flowbite-views

# Publish documentation
php artisan vendor:publish --tag=flowbite-docs

# Publish everything
php artisan vendor:publish --tag=flowbite-all
```

## Quick Start

### 1. Tailwind CSS Setup

Add package paths to your `tailwind.config.js`:

```js
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './vendor/destech-hasar-cozumleri-a-s/larabite/resources/**/*.blade.php',
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
```

### 2. Alpine.js Setup

```bash
npm install alpinejs
```

In `resources/js/app.js`:

```js
import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.start()
```

### 3. Use Your First Component

```blade
<x-ui::button variant="primary" size="md">
    Click Me
</x-ui::button>

<x-ui::card shadow="true">
    <x-ui::typography.heading level="2">
        Card Title
    </x-ui::typography.heading>
    <x-ui::typography.paragraph>
        Card content goes here.
    </x-ui::typography.paragraph>
</x-ui::card>

<x-ui::alert variant="success" dismissible="true">
    Operation completed successfully!
</x-ui::alert>
```

## Component Categories

### ✍️ Typography Components (8)

Text-based components:

```blade
<x-ui::typography.heading level="1">Heading</x-ui::typography.heading>
<x-ui::typography.paragraph>Paragraph text</x-ui::typography.paragraph>
<x-ui::typography.text variant="lead">Lead text</x-ui::typography.text>
<x-ui::typography.blockquote>Quote</x-ui::typography.blockquote>
<x-ui::typography.list type="ordered">List</x-ui::typography.list>
<x-ui::typography.link href="#">Link</x-ui::typography.link>
<x-ui::typography.hr variant="default" />
```

[📖 Typography Documentation](docs/components/typography/)

### 🎨 UI Components (38)

General interface components:

```blade
{{-- Basic Components --}}
<x-ui::button variant="primary">Button</x-ui::button>
<x-ui::badge variant="success">Badge</x-ui::badge>
<x-ui::card>Card</x-ui::card>
<x-ui::alert variant="info">Alert</x-ui::alert>
<x-ui::avatar src="..." />

{{-- Navigation --}}
<x-ui::navbar />
<x-ui::breadcrumb />
<x-ui::tabs />
<x-ui::pagination />

{{-- Notifications --}}
<x-ui::toast type="success">Success!</x-ui::toast>
<x-ui::tooltip content="Help">Icon</x-ui::tooltip>

{{-- Media --}}
<x-ui::video type="youtube" src="..." />
<x-ui::gallery />

{{-- Data Display --}}
<x-ui::table />
<x-ui::timeline />
<x-ui::stepper />
<x-ui::progress value="75" />
```

[📖 UI Components Documentation](docs/components/ui/)

### 📝 Form Components (14)

Form elements with validation support:

```blade
<x-ui::form.input
    label="Email"
    type="email"
    name="email"
    required
/>

<x-ui::form.select
    label="Category"
    name="category"
    :options="$categories"
/>

<x-ui::form.textarea
    label="Description"
    name="description"
    rows="4"
/>

<x-ui::form.checkbox
    label="I agree"
    name="terms"
/>

<x-ui::form.toggle
    label="Enable notifications"
    name="notifications"
/>

<x-ui::form.datepicker
    label="Select Date"
    name="date"
/>

<x-ui::form.file-input
    label="Upload File"
    name="file"
    accept="image/*"
/>
```

[📖 Form Components Documentation](docs/components/forms/)

## Livewire Integration

All components work seamlessly with Livewire:

```php
<?php

namespace App\Livewire;

use Livewire\Component;

class UserProfile extends Component
{
    public $name;
    public $email;
    public $showToast = false;

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        // Save operation...

        $this->showToast = true;
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
```

```blade
{{-- livewire/user-profile.blade.php --}}
<div>
    <x-ui::card>
        <form wire:submit.prevent="save">
            <x-ui::form.input
                label="Name"
                wire:model="name"
            />

            <x-ui::form.input
                label="Email"
                type="email"
                wire:model="email"
            />

            <x-ui::button type="submit" variant="primary">
                Save
            </x-ui::button>
        </form>
    </x-ui::card>

    @if($showToast)
        <x-ui::toast type="success">
            Profile updated!
        </x-ui::toast>
    @endif
</div>
```

## Customization

### Changing Default Values

In `config/flowbite-laravel.php`:

```php
return [
    'prefix' => 'ui', // Component prefix

    'defaults' => [
        'button' => [
            'variant' => 'primary',
            'size' => 'md',
        ],
        'card' => [
            'shadow' => true,
            'border' => true,
        ],
    ],

    'dark_mode' => true, // Dark mode support
];
```

### Customizing Components

After publishing components, you can customize them in `resources/views/components/ui/`:

```bash
php artisan vendor:publish --tag=flowbite-components
```

### Changing Prefix

In your `.env` file:

```env
FLOWBITE_PREFIX=flowbite
```

Now you can use components like:

```blade
<x-flowbite.button>Button</x-flowbite.button>
```

## Popular Components

### Modal (Dialog)

```blade
<div x-data="{ open: false }">
    <x-ui::button @click="open = true">
        Open Modal
    </x-ui::button>

    <x-ui::modal
        x-show="open"
        @close="open = false"
        title="Confirmation"
    >
        <p>Do you confirm this action?</p>

        <x-slot:footer>
            <x-ui::button
                @click="open = false"
                variant="outline"
            >
                Cancel
            </x-ui::button>
            <x-ui::button
                variant="primary"
                wire:click="confirm"
            >
                Confirm
            </x-ui::button>
        </x-slot:footer>
    </x-ui::modal>
</div>
```

### Dropdown Menu

```blade
<x-ui::dropdown>
    <x-slot:trigger>
        <x-ui::button variant="outline">
            Menu
            <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </x-ui::button>
    </x-slot:trigger>

    <x-ui::dropdown.item href="/profile">
        Profile
    </x-ui::dropdown.item>
    <x-ui::dropdown.item href="/settings">
        Settings
    </x-ui::dropdown.item>
    <x-ui::dropdown.divider />
    <x-ui::dropdown.item href="/logout">
        Logout
    </x-ui::dropdown.item>
</x-ui::dropdown>
```

### Data Table

```blade
<x-ui::table striped hover>
    <x-ui::table.head>
        <x-ui::table.row>
            <x-ui::table.header sortable>Name</x-ui::table.header>
            <x-ui::table.header>Email</x-ui::table.header>
            <x-ui::table.header>Status</x-ui::table.header>
            <x-ui::table.header>Actions</x-ui::table.header>
        </x-ui::table.row>
    </x-ui::table.head>

    <x-ui::table.body>
        @foreach($users as $user)
            <x-ui::table.row>
                <x-ui::table.cell>{{ $user->name }}</x-ui::table.cell>
                <x-ui::table.cell>{{ $user->email }}</x-ui::table.cell>
                <x-ui::table.cell>
                    <x-ui::badge :variant="$user->active ? 'success' : 'error'">
                        {{ $user->active ? 'Active' : 'Inactive' }}
                    </x-ui::badge>
                </x-ui::table.cell>
                <x-ui::table.cell>
                    <x-ui::button size="sm" variant="ghost">
                        Edit
                    </x-ui::button>
                </x-ui::table.cell>
            </x-ui::table.row>
        @endforeach
    </x-ui::table.body>
</x-ui::table>
```

### Tabs

```blade
<x-ui::tabs defaultTab="profile">
    <x-ui::tabs.item id="profile" variant="underline">
        Profile
    </x-ui::tabs.item>
    <x-ui::tabs.item id="settings" variant="underline">
        Settings
    </x-ui::tabs.item>
    <x-ui::tabs.item id="billing" variant="underline">
        Billing
    </x-ui::tabs.item>

    <x-ui::tabs.panel id="profile">
        <p>Profile content</p>
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="settings">
        <p>Settings content</p>
    </x-ui::tabs.panel>

    <x-ui::tabs.panel id="billing">
        <p>Billing content</p>
    </x-ui::tabs.panel>
</x-ui::tabs>
```

## Requirements

- PHP 8.1 or higher
- Laravel 10.x or 11.x
- Tailwind CSS 3.x
- Alpine.js 3.x (optional, required for some components)

## Documentation

For detailed documentation:

```bash
php artisan vendor:publish --tag=flowbite-docs
```

After publishing, you can find it in the `docs/flowbite/` directory.

### Online Documentation

- [Getting Started Guide](docs/README.md)
- [Typography Components](docs/components/typography/)
- [UI Components](docs/components/ui/)
- [Form Components](docs/components/forms/)
- [Development Standards](docs/components/standards.md)
- [Usage Examples](docs/components/examples.md)

## Component List

### Typography (8 Components)
- Heading, Paragraph, Text, Blockquote, Image, List, Link, HR

### UI (38 Components)
- Accordion, Alert, Avatar, Badge, Banner, Bottom Nav, Breadcrumb, Button, Card, Clipboard, Data Table, Device Mockup, Drawer, Dropdown, Footer, Gallery, Hero, Indicator, KBD, List Group, Mega Menu, Modal, Navbar, Pagination, Popover, Progress, Rating, Sidebar, Skeleton, Speed Dial, Spinner, Stepper, Table, Tabs, Timeline, Toast, Tooltip, Video

### Form (14 Components)
- Input, Select, Textarea, Checkbox, Radio, Toggle, Range, File Input, Search Input, Number Input, Phone Input, Datepicker, Timepicker, Floating Label

## Examples

For more examples, see the `examples/` directory:

```bash
php artisan vendor:publish --tag=flowbite-examples
```

## Changelog

For all changes, see the [CHANGELOG.md](CHANGELOG.md) file.

## Contributing

We welcome your contributions! Please read [CONTRIBUTING.md](CONTRIBUTING.md).

## Security

For security vulnerabilities, please read [SECURITY.md](SECURITY.md).

## License

MIT License. See [LICENSE.md](LICENSE.md) for details.

## Credits

- [Flowbite](https://flowbite.com) - UI component library
- [Tailwind CSS](https://tailwindcss.com) - CSS framework
- [Alpine.js](https://alpinejs.dev) - JavaScript framework
- [Laravel](https://laravel.com) - PHP framework
- [Livewire](https://laravel-livewire.com) - Full-stack framework

## Support

- 📧 Email: erman.titiz@destechhasar.com
- 🐛 Issues: [GitHub Issues](https://github.com/destech-hasar-cozumleri-a-s/larabite/issues)
- 💬 Discussions: [GitHub Discussions](https://github.com/destech-hasar-cozumleri-a-s/larabite/discussions)

---

Developed with ❤️ by **Destech Development Team**.